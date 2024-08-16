<?php

namespace Database\Factories;

use App\Models\capacitacion_equipo;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\CapacitacionMarca;
use App\Models\CapacitacionModelo;
use App\Models\CapacitacionTipo;

class capacitacion_equipoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = capacitacion_equipo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $capacitacionTipo = CapacitacionTipo::first();
        if (!$capacitacionTipo) {
            $capacitacionTipo = CapacitacionTipo::factory()->create();
        }

        return [
            'marca_id' => $this->faker->word,
            'modelo_id' => $this->faker->word,
            'tipo_id' => $this->faker->word,
            'numero_serie' => $this->faker->text($this->faker->numberBetween(5, 100)),
            'imei' => $this->faker->text($this->faker->numberBetween(5, 100)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'update_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
