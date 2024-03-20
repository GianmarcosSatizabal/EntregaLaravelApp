<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "curso";

    protected $primaryKey = "id";

    protected $fillable = ["id", "nombre", "edad", "telefono", "id_jefe", "correo"];

    public function empleados()
    {
        return $this->hasMany(Curso::class, "id_jefe", "id");
    }

    public function jefe()
    {
        return $this->belongsTo(Curso::class, "id_jefe", "id");
    }
}