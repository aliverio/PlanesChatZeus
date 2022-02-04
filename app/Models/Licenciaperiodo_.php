<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licenciaperiodo_ extends Model {
	use HasFactory;

    public $timestamps = false;
    protected $table = 'chatzeus.licencia_periodos';
    protected $primaryKey = 'licencia_periodo_id';
    protected $fillable = [
        'codigo',
        'descripcion',
        'cantidad_dias'
    ];

}