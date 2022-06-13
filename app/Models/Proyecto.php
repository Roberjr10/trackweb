<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos';

    protected $fillable = [
        'nombreUser',
        'nombre',
        'Descripcion',
        'mptres',
        'imagen',
        'cantidad_mg',
        'cantidad_list'

    ];
}
