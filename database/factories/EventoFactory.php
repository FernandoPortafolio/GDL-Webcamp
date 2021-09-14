<?php

namespace Database\Factories;

use App\Models\Evento;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Evento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'evento' => $this->faker->sentence(),
            'fecha' => $this->faker->dateTimeBetween('2021/12/16', '2021/12/20'),
            'hora' => $this->faker->time(),
            'clave' => $this->faker->word(),
            'categoria_id' => $this->faker->numberBetween(1,3),
            'invitado_id' => $this->faker->numberBetween(1,6),
        ];
    }
}
