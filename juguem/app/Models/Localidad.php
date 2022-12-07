<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
     //use HasFactory;
     protected $table="localidad";
     protected $primaryKey="id_localidad";
     protected $fillable = [
         'nombre','provincia'
     ];
 
     //no trabajo con las columna timestamp
     public $timestamps=false;
}
