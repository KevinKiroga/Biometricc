<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;



class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){

        // Validar campos del form login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['invalid_credentials' => 'Email y contraseña son incorrecta'])->withInput();

    }

    public function register(){
        return view ('auth.register');
    }


    public function store(Request $request)
    {
        // Validar campos del formulario de registro
        $request->validate([
            'name' => 'required',
            'typeDocument' => 'required',
            'document' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'password_confirmation' => 'required|same:password'
        ]);



        // El correo electrónico es válido, continuar con el proceso de registro
        User::create([
            'name' => $request->name,
            'typeDocument' => $request->typeDocument,
            'document' => $request->document,
            'phone' => $request->phone,
            'email' => $request -> email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('login')->with('success', 'Usuario creado correctamente');
    }

    public function forgotPassword(){
        return view('auth.verifyEmail');
    }

    public function verifyEmail(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);
        $token = Str::random(60);

        DB::table('password_reset_tokens')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('auth.verify',['token' => $token], function($message) use ($request) {
                $message->to($request->email)->subject('Restablecer contraseña para la plataforma Biometric');
            });

        return back()->with('message', 'Se ha enviado un correo para restablecer su contraseña!');
    }

    public function resetPassword($token){
        return view('auth.resetPassword', ['token' => $token]);
    }

    public function updatePassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:5',
            'confirmPassword' => 'required|same:password'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
        ->where(['email' => $request->email, 'token' => $request->token])
        ->first();

        if($updatePassword){

            $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

            DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();

            return redirect()->route('login')->with('success', 'Contraseña actualizada correctamente');

        }else {
            return back()->withInput()->with('error', 'Token no existe o Token expirado!');
        }

    }


    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente');
    }



}
