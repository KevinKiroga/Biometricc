<?php

namespace App\Http\Controllers\Admin;

use App\Models\Programa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramaController extends Controller
{
    public function index()
    {
        $programas = Programa::all();

        return view('home.admin.programa.index', compact('programas'));
    }

    public function create()
    {
        return view('home.admin.programa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_program' => 'required',
        ]);

        Programa::create([
            'name_program' => $request->name_program,
        ]);

        return redirect()->route('programa.index')->with('success', 'Programa creado exitosamente');
    }

    public function edit(Programa $programa)
    {
        return view('home.admin.programa.edit', compact('programa'));
    }

    public function update(Request $request, Programa $programa)
    {
        $request->validate([
            'name_program' => 'required',
        ]);

        $programa->update([
            'name_program' => $request->name_program,
        ]);

        return redirect()->route('programa.index')->with('success', 'Programa actualizado exitosamente');
    }

    public function destroy(Programa $programa)
    {
        $programa->delete();

        return redirect()->route('programa.index')->with('success', 'Programa eliminado exitosamente');
    }
}