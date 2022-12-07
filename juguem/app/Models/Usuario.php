<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //use HasFactory;
    protected $table="usuario";
    protected $primaryKey="id_usuario";
    protected $fillable = [
        'id_localidad','nombre','apellido'
    ];

    //no trabajo con las columna timestamp
    public $timestamps=false;

    //relacion uno a muchos(inversa)
    public function partidas(){
       return $this->belongsTo('App\Models\Partida');
}
}