<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabla extends Model
{
	use HasFactory;

    public $timestamps = false;
    protected $table = 'chatzeus.tablas';
    protected $primaryKey = 'tabla_id';
    protected $fillable = ['descripcion','valor','campos'];

}