<?php

namespace Database\Factories;

use App\Models\Tabla;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TablaFactory extends Factory
{
    protected $model = Tabla::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
			'valor' => $this->faker->name,
			'campos' => $this->faker->name,
        ];
    }
}
