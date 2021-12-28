<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanOpcionLiga_ extends Model {
	use HasFactory;

    public $timestamps = false;
    protected $table = 'chatzeus.planes_opciones_ligas';
    protected $primaryKey = 'plan_opcion_id';
    protected $fillable = ['plan_licenciamiento_id','catalogo_opcion_id','activo'];

}