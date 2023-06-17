<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('rules.admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rules.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario de creación
        $validatedData = $request->validate([
            'name' => 'required',
            'typeDocument' => 'required|in:TI,CC,CE',
            'document' => 'required|integer',
            'phone' => 'required|numeric',
            'status' => 'required|in:ATIVO,INATIVO',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Subir la imagen si se proporcionó
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image'] = $imagePath;
        }

        // Hashear la contraseña
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Crear un nuevo usuario en la base de datos
        $user = User::create($validatedData);

        // Redirigir a la página de índice de usuarios
        return redirect()->route('user.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('rules.admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('rules.admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario de edición
        $validatedData = $request->validate([
            'name' => 'required',
            'typeDocument' => 'required|in:TI,CC,CE',
            'document' => 'required|integer',
            'phone' => 'required|numeric',
            'status' => 'required|in:ATIVO,INATIVO',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Buscar el usuario a actualizar
        $user = User::findOrFail($id);

        // Actualizar los datos del usuario
        $user->name = $validatedData['name'];
        $user->typeDocument = $validatedData['typeDocument'];
        $user->document = $validatedData['document'];
        $user->phone = $validatedData['phone'];
        $user->status = $validatedData['status'];
        $user->email = $validatedData['email'];

        // Actualizar la contraseña si se proporcionó
        if ($validatedData['password']) {
            $user->password = Hash::make($validatedData['password']);
        }

        // Actualizar la imagen si se proporcionó
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $user->image = $imagePath;
        }

        // Guardar los cambios en la base de datos
        $user->save();

        // Redirigir a la página de índice de usuarios
        return redirect()->route('user.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el usuario a eliminar
        $user = User::findOrFail($id);

        // Eliminar la imagen asociada si existe
        if ($user->image) {
            Storage::delete($user->image);
        }

        // Eliminar el usuario
        $user->delete();

        // Redirigir a la página de índice de usuarios
        return redirect()->route('user.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
