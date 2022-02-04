<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planlicenciamiento_ extends Model {
	use HasFactory;

    public $timestamps = false;
    protected $table = 'chatzeus.planes_licenciamiento';
    protected $primaryKey = 'plan_licenciamiento_id';
    protected $fillable = ['descripcion','limite_usuario'];

}