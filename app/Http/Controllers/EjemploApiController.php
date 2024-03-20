<?php

namespace App\Http\Controllers;

use App\Resource\Curso\Manager;
use Illuminate\Http\Request;

class EjemploApiController extends Controller
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
        return response()
            ->json($this->manager->listarIntegrantesDelCurso());
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
        // dd("hola");
        return $this->manager->crearIntegranteDelCurso($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->manager->buscarIntegranteDelCurso($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->manager->actualizarIntegrantesDelCurso($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->manager->eliminarIntegrantesDelCurso($id);
    }
}