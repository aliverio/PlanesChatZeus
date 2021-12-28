<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta_ extends Model {
	use HasFactory;

    public $timestamps = false;
    protected $table = 'chatzeus.cuentas';
    protected $primaryKey = 'cuenta_id';

}