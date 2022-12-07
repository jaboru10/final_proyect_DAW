<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pista extends Model
{
     //use HasFactory;
     protected $table="pista";
     protected $primaryKey="id_pista";
     protected $fillable = [
         'id_localidad','id_deporte','direccion'
     ];
 
     //no trabajo con las columna timestamp
     public $timestamps=false;

     //relacion uno a muchos(inversa)
     public function localidad(){
        return $this->belongsTo('App\Models\Localidad');
     }
}
