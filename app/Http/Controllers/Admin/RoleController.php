<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('home.admin.role.index' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect()->route('role.create')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('home.admin.role.edit' , compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $role = Role::find($request->id);

        if (!empty($request->name) &&  $request->name !== $role->name) {
            $role->name = $request->name;
        }else {
            $role->name = $role->name;
        }

        if ($role->isDirty()) {
            $role->update();
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
        $role = Role::findOrFail($id);

        // Eliminar el usuario
        $role->delete();

        return redirect()->route('role.index')->with('success', 'Usuario eliminado correctamente');
    }
}
