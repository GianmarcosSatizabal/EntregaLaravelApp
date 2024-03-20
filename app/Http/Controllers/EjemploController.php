<?php

namespace App\Http\Controllers;

use App\Resource\Curso\Manager;
use Illuminate\Http\Request;

class EjemploController extends Controller
{
    public $manager;

    function __construct()
    {
        $this->manager = new Manager();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = $this->manager->listarIntegrantesDelCurso();
        return view("curso.index")
            ->with("integrantes", $registros);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $curso = $this->manager->crearIntegranteDelCurso($request);
        if ($curso) {
            return redirect()->back();
        } else {
            dd("No se pudo crear el integrante del curso");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("curso.show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("curso.edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $integrante = $this->manager->actualizarIntegrantesDelCurso($request, $id);
        if ($integrante) {
            return redirect()->back();
        } else {
            dd("No se pudo actualizar el integrante del curso");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $integrante = $this->manager->eliminarIntegrantesDelCurso($id);
        if ($integrante) {
            return redirect()->back();
        } else {
            dd("No se pudo eliminar el integrante del curso");
        }
    }
}