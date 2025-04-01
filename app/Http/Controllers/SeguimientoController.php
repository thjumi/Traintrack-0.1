<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rutina;
use Illuminate\Support\Facades\Auth;
use App\Contracts\SeguimientoServiceInterface;


class SeguimientoController extends Controller
{
    protected $seguimientoService;

    public function __construct(SeguimientoServiceInterface $seguimientoService)
    {
        $this->seguimientoService = $seguimientoService;
    }

    public function index()
    {
        $seguimientos = $this->seguimientoService->getAllSeguimientos();

        return view('seguimientos.index', compact('seguimientos'));
    }

    public function show($id)
    {
        $seguimiento = $this->seguimientoService->getSeguimientoById($id);

        return view('seguimientos.show', compact('seguimiento'));
    }

    public function create()
    {
        $rutinas = Rutina::where('user_id', Auth::id())->get();
        return view('seguimientos.create', compact('rutinas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rutina_id' => 'required|integer|exists:rutinas,id',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
            'fecha' => 'required|date',
            'progreso' => 'required|numeric',
            'notas' => 'nullable|string|max:500',
        ]);


        $data = $request->all();
        $data['user_id'] = Auth::id();

        $this->seguimientoService->createSeguimiento($data);

        return redirect()->route('seguimientos.index')->with('success', 'Seguimiento creado exitosamente.');
    }


    public function edit($id)
    {
        $seguimiento = $this->seguimientoService->getSeguimientoById($id);

        return view('seguimientos.edit', compact('seguimiento'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha' => 'required|date',
            'altura' => 'required|numeric',
            'peso' => 'required|numeric',
            'progreso' => 'required|string|max:255',
            'notas' => 'nullable|string|max:500',
        ]);

        $this->seguimientoService->updateSeguimiento($id, $request->all());

        return redirect()->route('seguimientos.index')->with('success', 'Seguimiento actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $this->seguimientoService->deleteSeguimiento($id);

        return redirect()->route('seguimientos.index')->with('success', 'Seguimiento eliminado exitosamente.');
    }
}
