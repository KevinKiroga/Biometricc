<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function profile ()
    {
        $user = auth()->user();
        return view('home.admin.user.profile' , compact('user'));
    }

    public function updateProfile(Request $request)
    {

        $userId = Auth::user()->id;
        $user = User::find($userId);

        if (!empty($request->name)) {
            $user->name = $request->name;
        }else {
            $user->name = $user->name;
        }

        if (!empty($request->document)) {
            $user->document = $request->document;
        }else {
            $user->document = $user->document;
        }

        if (!empty($request->phone)) {
            $user->phone = $request->phone;
        }else {
            $user->phone = $user->phone;
        }

        if (!empty($request->email)) {
            $user->email = $request->email;
        }else {
            $user->email = $user->email;
        }

        if (!empty($request->password)) {
            $user->password = $request->password;
        }else {
            $user->password = $user->password;
        }



        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = 'img/profile/';
            $extension = $file->getClientOriginalExtension();
            $filename = $user->name . '.' . $extension;
            $uploadSuccess = $file->move(public_path($destinationPath), $filename);
            $user->image = $destinationPath . $filename;
        }

        $user->save();

        return redirect()->back()->with('sucess' , 'Perfil actualizado');
    }



    public function index()
    {
        $users = $users = User::with('roles')->get();
        return view('home.admin.user.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::find(auth()->user()->id);
        $roles = $user->roles;

        return view('home.admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'typeDocument' => 'required',
            'document' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'password_confirmation' => 'required|same:password',
            'role' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->typeDocument = $request->typeDocument;
        $user->document = $request->document;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = $request->status; // Set the value for the "estatus" field
        $user->save();

        $role = Role::find($request->role);

        if ($role) {
            $user->roles()->attach($role);
        } else {
            return redirect()->back()->with('error', 'Invalid role selected');
        }

        return redirect()->route('users.create')->with('success', 'User created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('home.admin.user.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = User::find($request->id);

        if (!empty($request->name) &&  $request->name !== $user->name) {
            $user->name = $request->name;
        }else {
            $user->name = $user->name;
        }

        if (!empty($request->typeDocument) &&  $request->typeDocument !== $user->typeDocument) {
            $user->typeDocument = $request->typeDocument;
        }else {
            $user->typeDocument = $user->typeDocument;
        }


        if (!empty($request->document) && $request->document !== $user->document) {
            $user->document = $request->document;
        }else {
            $user->document = $user->document;
        }

        if (!empty($request->status) && $request->phone !== $user->status) {
            $user->status = $request->status;
        }else {
            $user->status = $user->status;
        }

        if (!empty($request->phone) && $request->phone !== $user->phone) {
            $user->phone = $request->phone;
        }else {
            $user->phone = $user->phone;
        }


        if (!empty($request->email) && $request->email !== $user->email) {
            $user->email = $request->email;
        }else {
            $user->email = $user->email;
        }

        if (!empty($request->password) && $request->password !== $user->password) {
            $user->password = $request->password;
        }else {
            $user->password = $user->password;
        }



        if ($user->isDirty()) {
            $user->update();
            return redirect()->back()->with('success', 'Los datos se han actualizado exitosamente');
        } else {
            return redirect()->back()->with('danger', 'Los datos se han actualizado exitosamente');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Verificar si el usuario tiene una imagen y eliminarla
        if ($user->image) {
            $filename = basename($user->image);
            Storage::delete('img/profile/' . $filename);
        }

        // Eliminar las relaciones del usuario con los roles
        $user->roles()->detach();

        // Eliminar el usuario
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente');
    }
}
