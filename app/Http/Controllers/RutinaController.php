<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rutina;
use App\Models\Ejercicio;
use Illuminate\Support\Facades\Auth;

class RutinaController extends Controller
{
    public function index()
    {
        $rutinas = Rutina::with('ejercicios')->get();
        return view('rutinas.index', compact('rutinas'));
    }

    public function create()
    {
        $ejercicios = Ejercicio::all();
        return view('rutinas.create', compact('ejercicios'));
    }

    public function show($id)
    {
        $rutina = Rutina::with('ejercicios')->findOrFail($id);
        return view('rutinas.show', compact('rutina'));
    }

    public function edit($id)
    {
        $rutina = Rutina::findOrFail($id);
        $ejercicios = Ejercicio::all(); // Obtener todos los ejercicios disponibles
        return view('rutinas.edit', compact('rutina', 'ejercicios'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fechaCreacion' => 'required|date',
            'ejercicios' => 'required|array|min:1',
            'ejercicios.*.id' => 'exists:ejercicios,id',
            'ejercicios.*.repeticiones' => 'required|integer|min:1',
            'ejercicios.*.series' => 'required|integer|min:1',
            'ejercicios.*.descansos' => 'required|integer|min:0',
        ]);

        $user = Auth::user();
        if (!$user) {
            return redirect()->back()->with('error', 'Debes estar autenticado.');
        }

        // Crear rutina
        $rutina = new Rutina();
        $rutina->fill($request->only(['nombre', 'descripcion', 'fechaCreacion']));
        $rutina->user_id = $user->id;
        $rutina->save();

        // Crear array para pivot: clave = id del ejercicio, valor = datos adicionales
        $ejerciciosArray = collect($request->ejercicios)->mapWithKeys(function ($ejercicio) {
            return [
                $ejercicio['id'] => [
                    'repeticiones' => $ejercicio['repeticiones'],
                    'series'       => $ejercicio['series'],
                    'descansos'    => $ejercicio['descansos'],
                ]
            ];
        })->all();

        $rutina->ejercicios()->attach($ejerciciosArray);

        return redirect()->route('rutinas.index')->with('success', 'Rutina creada correctamente.');
    }

    public function update(Request $request, $id)
    {
        $rutina = Rutina::findOrFail($id);

        // Actualizar los datos básicos de la rutina
        $rutina->update($request->only(['nombre', 'descripcion']));

        // Procesar ejercicios existentes: filtramos los que no se marcan para eliminar
        $ejerciciosArray = collect($request->ejercicios)
            ->filter(fn($ejercicio) => !isset($ejercicio['eliminar']))
            ->mapWithKeys(fn($ejercicio) => [
                $ejercicio['id'] => [
                    'repeticiones' => $ejercicio['repeticiones'],
                    'series'       => $ejercicio['series'],
                    'descansos'    => $ejercicio['descansos'],
                ]
            ])->all();

        // Actualiza la relación: sync() eliminará automáticamente los que no estén presentes
        $rutina->ejercicios()->sync($ejerciciosArray);

        // Agregar nuevos ejercicios (sin eliminar los existentes) con valores por defecto
        if ($request->has('nuevos_ejercicios')) {
            foreach ($request->nuevos_ejercicios as $ejercicio_id) {
                $rutina->ejercicios()->syncWithoutDetaching([
                    $ejercicio_id => ['repeticiones' => 10, 'series' => 3, 'descansos' => 30]
                ]);
            }
        }

        return redirect()->route('rutinas.index')->with('success', 'Rutina actualizada correctamente.');
    }

    public function destroy(Rutina $rutina)
    {
        // Eliminar la relación en la tabla pivote y luego la rutina
        $rutina->ejercicios()->detach();
        $rutina->delete();

        return redirect()->route('rutinas.index')->with('success', 'Rutina eliminada correctamente.');
    }
}
