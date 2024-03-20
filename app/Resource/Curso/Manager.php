<?php

namespace App\Resource\Curso;

use App\Models\Curso;

class Manager
{

    public $nombre;
    function __construct()
    {
        $this->nombre = "Hola mundo";
    }

    public function buscarIntegranteDelCurso($id)
    {
        return Curso::find($id);
        // return Curso::where('id', $id)->first();
    }

    public function listarIntegrantesDelCurso()
    {
        return Curso::all();
    }

    public function crearIntegranteDelCurso($request)
    {
        // dd($request->all());
        return Curso::create([
            "nombre" => $request->nombre,
            "edad" => $request->edad,
            "telefono" => $request->telefono,
            "correo" => $request->correo,

            "id_jefe" => $request->id_jefe,
        ]);
    }
    public function actualizarIntegrantesDelCurso($request, $id)
    {
        return Curso::where("id", $id)->update([
            "nombre" => $request->nombre,
            "edad" => $request->edad,
            "telefono" => $request->telefono,
            "correo" => $request->correo,

            "id_jefe" => null,
        ]);
    }

    public function eliminarIntegrantesDelCurso($id)
    {
        return Curso::where("id", $id)->delete();
    }

}