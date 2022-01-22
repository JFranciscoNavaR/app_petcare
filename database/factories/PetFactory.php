<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => 1,
            'edad' => 1,
            'sexo' => 1,
            'peso' => 1,
            'color' => 1,
            'raza' => 1,
            'especie' => 1,
            'descripcion' => 1,
            'image' => '/storage/pets/' . $this->faker->image('public/storage/pets', 640, 480, null, false),
            'type_id' => 1,
            'statu_id' => 1,
            'user_id' => 1,
        ];
    }
}
