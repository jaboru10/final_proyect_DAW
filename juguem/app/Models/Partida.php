<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    //use HasFactory;
    protected $table="partida";
    protected $primaryKey="id_partida";
    protected $fillable = [
        'id_pista','fecha_partida'
    ];

    //no trabajo con las columna timestamp
    public $timestamps=false;

    //relacion uno a muchos(inversa)
    public function usuarios(){
       return $this->belongsTo('App\Models\Usuario');
}
}
