<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Cuota;
use App\Models\Disciplina;

// use App\Notifications\SweetAlertNotification;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        $disciplinas = Disciplina::all();
        return view('alumnos.create', compact('disciplinas'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'apellido' => 'required',
        'dni' => 'required',
        // ... otras validaciones
    ]);

    $alumno = Alumno::create($request->all());

    // Asociar las disciplinas al alumno
    if ($request->has('disciplinas')) {
        $alumno->disciplinas()->attach($request->input('disciplinas'));
    }

    // Crear cuotas para el alumno
    $alumno->crearCuotas();

    return redirect()->route('alumnos.index')->with('success', 'Alumno creado exitosamente');
}

    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    public function edit(Alumno $alumno)
    {
        $disciplinas = Disciplina::all();
        return view('alumnos.edit', compact('alumno', 'disciplinas'));
    }



    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required',
            'disciplinas' => 'array', // Asegúrate de que 'disciplinas' sea un array
        ]);

        $alumno->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'dni' => $request->dni,
        ]);

        // Sincroniza las disciplinas del alumno
        $alumno->disciplinas()->sync($request->disciplinas);

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado exitosamente');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        // $this->guardarNotificacionSweetAlert('Éxito', 'El alumno fue eliminado correctamente.', 'success');

        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado exitosamente');
    }
    public function showCuotas(Alumno $alumno)
    {
    $cuotas = Cuota::where('alumno_id', $alumno->id)->get();

    return view('alumnos.show', compact('alumno', 'cuotas'));
    }
    

}
