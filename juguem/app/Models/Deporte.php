<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    //use HasFactory;
    protected $table="deporte";
    protected $primaryKey="id_deporte";
    protected $fillable = [
        'nombre','numero_jugadores'
    ];


}
