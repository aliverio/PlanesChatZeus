<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoOpcion_ extends Model {
	use HasFactory;

    public $timestamps = false;
    protected $table = 'chatzeus.catalogo_opciones';
    protected $primaryKey = 'catalogo_opcion_id';
    protected $fillable = ['descripcion','clave'];

}