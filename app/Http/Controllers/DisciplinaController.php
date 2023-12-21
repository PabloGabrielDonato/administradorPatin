<?php

// app/Http/Controllers/DisciplinaController.php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index()
    {
        $disciplinas = Disciplina::all();
        return view('disciplinas.index', compact('disciplinas'));
    }

    public function create()
    {
        return view('disciplinas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric|min:0',
        ]);

        Disciplina::create($request->all());

        return redirect()->route('disciplinas.index')->with('success', 'Disciplina creada exitosamente');
    }

    public function show(Disciplina $disciplina)
    {
        return view('disciplinas.show', compact('disciplina'));
    }

    public function edit(Disciplina $disciplina)
    {
        return view('disciplinas.edit', compact('disciplina'));
    }

    public function update(Request $request, Disciplina $disciplina)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric|min:0',
        ]);

        $disciplina->update($request->all());

        return redirect()->route('disciplinas.index')->with('success', 'Disciplina actualizada exitosamente');
    }

    public function destroy(Disciplina $disciplina)
    {
        $disciplina->delete();
        return redirect()->route('disciplinas.index')->with('success', 'Disciplina eliminada exitosamente');
    }
}
