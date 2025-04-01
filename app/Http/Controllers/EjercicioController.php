<?php
namespace App\Http\Controllers;

use App\Contracts\EjercicioServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EjercicioController extends Controller
{
    protected $ejercicioService;

    public function __construct(EjercicioServiceInterface $ejercicioService)
    {
        $this->ejercicioService = $ejercicioService;
    }

    public function index()
    {
        $ejercicios = $this->ejercicioService->getAllEjercicios();

        return view('ejercicios.index', compact('ejercicios'));
    }

    public function create()
    {
        // Todos los usuarios pueden acceder a esta vista
        return view('ejercicios.create');
    }

    public function store(Request $request)
    {
            $request->validate([
                'nombre' => 'required|string|max:100',
                'descripcion' => 'required|string',
                'grupoMuscular' => 'required|string|max:50',
                'dificultad' => 'required|integer|min:1|max:10',
            ]);
            

        $this->ejercicioService->createEjercicio($request->all());

        return redirect()->route('ejercicios.index')->with('success', 'Ejercicio creado exitosamente.');
    }

    public function show($id)
    {
        $ejercicio = $this->ejercicioService->getEjercicioById($id);

        return view('ejercicios.show', compact('ejercicio'));
    }

    public function edit($id)
    {
        $ejercicio = $this->ejercicioService->getEjercicioById($id);

        // Todos los usuarios pueden editar los ejercicios (si aplica)
        return view('ejercicios.edit', compact('ejercicio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'grupoMuscular' => 'required|string|max:50',
            'dificultad' => 'required|integer|min:1|max:10',
        ]);
        

        $this->ejercicioService->updateEjercicio($id, $request->all());

        return redirect()->route('ejercicios.index')->with('success', 'Ejercicio actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $this->ejercicioService->deleteEjercicio($id);

        return redirect()->route('ejercicios.index')->with('success', 'Ejercicio eliminado exitosamente.');
    }
}
