<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaView_ extends Model {
	use HasFactory;

    public $timestamps = false;
    protected $table = 'chatzeus.vw_cuentas';
    protected $primaryKey = 'cuenta_id';

}