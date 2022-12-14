<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida_Usuario extends Model
{
    //use HasFactory;
    protected $table="partida_usuario";
    protected $primaryKey="id_partida";
    protected $fillable = [
        'id_usuario','creador'
    ];

    //no trabajo con las columna timestamp
    public $timestamps=false;
}
