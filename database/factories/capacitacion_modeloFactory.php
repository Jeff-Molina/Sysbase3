<?php

namespace Database\Factories;

use App\Models\capacitacion_modelo;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\CapacitacionMarca;

class capacitacion_modeloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = capacitacion_modelo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $capacitacionMarca = CapacitacionMarca::first();
        if (!$capacitacionMarca) {
            $capacitacionMarca = CapacitacionMarca::factory()->create();
        }

        return [
            'marca_id' => $this->faker->word,
            'nombre' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
