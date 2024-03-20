<?php

namespace App\Http\Controllers;

use App\Resource\Curso\Manager;
use Illuminate\Http\Request;

class CursoController extends Controller
{

    public $manager;
    function __construct()
    {
        $this->manager = new Manager();
        $integrante = $this->manager->listarIntegrantesDelCurso();

    }

    public function index()
    {
        $manager = new Manager();
        $registros = $manager->listarIntegrantesDelCurso();

        return view("curso.index")
            ->with("integrantes", $registros);
    }

    public function store(Request $request)
    {
        $manager = new Manager();
        $curso = $manager->crearIntegranteDelCurso($request);
        if ($curso) {
            return redirect()->back();
        } else {
            dd("No se pudo crear el integrante del curso");
        }
    }

    public function update(Request $request, $id)
    {
        $manager = new Manager();
        $integrante = $manager->actualizarIntegrantesDelCurso($request, $id);
        if ($integrante) {
            return redirect()->back();
        } else {
            dd("No se pudo actualizar el integrante del curso");
        }
    }


    public function delete($id)
    {
        $manager = new Manager();
        $integrante = $manager->eliminarIntegrantesDelCurso($id);
        if ($integrante) {
            return redirect()->back();
        } else {
            dd("No se pudo eliminar el integrante del curso");
        }
    }



    public function show()
    {
        return view("curso.show");
    }
    public function edit()
    {
        return view("curso.edit");
    }
}
