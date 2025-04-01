<?php
namespace App\Http\Controllers;
use App\Models\Rutina;
use App\Models\Ejercicio;
use App\Contracts\RutinaServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RutinaController extends Controller
{
    protected $rutinaService;

    public function __construct(RutinaServiceInterface $rutinaService)
    {
        $this->rutinaService = $rutinaService;
    }

    public function index()
{
    $rutinas = Rutina::where('user_id', Auth::id())->get();

    return view('rutinas.index', compact('rutinas'));
}


public function create()
{
    // Obtén los ejercicios existentes
    $ejercicios = Ejercicio::all(); // Asegúrate de importar el modelo Ejercicio con "use App\Models\Ejercicio"

    // Retorna la vista con los ejercicios
    return view('rutinas.create', compact('ejercicios'));
}

    
public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|min:10|max:40',
        'descripcion' => 'required|string|max:200',
        'fechaCreacion' => 'required|date',
        'ejercicios' => 'required|array',
    ]);

    // Crear la rutina
    $rutina = Rutina::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'fechaCreacion' => $request->fechaCreacion,
    ]);

    $rutina->ejercicios()->sync($request->ejercicios);

    return redirect()->route('rutinas.index')->with('success', 'Rutina creada exitosamente.');
}

    public function show($id)
    {
        $rutina = $this->rutinaService->getRutinaById($id);

        return view('rutinas.show', compact('rutina'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|min:10|max:40',
            'descripcion' => 'required|string|max:200',
            'fechaCreacion' => 'required|date',
            'ejercicios' => 'required|array',
        ]);
    
      
        $rutina = Rutina::create($request->only('nombre', 'descripcion', 'fechaCreacion'));
    
        // Asociar ejercicios con la rutina
        $rutina->ejercicios()->sync($request->ejercicios);
    
        return redirect()->route('rutinas.index')->with('success', 'Rutina creada exitosamente.');
    }

    public function destroy($id)
    {
        $this->rutinaService->deleteRutina($id);

        return redirect()->route('rutinas.index')->with('success', 'Rutina eliminada exitosamente.');
    }
}
