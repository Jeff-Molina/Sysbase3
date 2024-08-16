<?php

namespace Database\Factories;

use App\Models\capacitacion_servicio;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\CapacitacionCliente;
use App\Models\CapacitacionEquipo;
use App\Models\CapacitacionEstado;
use App\Models\User;

class capacitacion_servicioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = capacitacion_servicio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create();
        }

        return [
            'cliente_id' => $this->faker->word,
            'estado_id' => $this->faker->word,
            'equipo_id' => $this->faker->word,
            'user_id' => $this->faker->word,
            'precio' => $this->faker->numberBetween(0, 9223372036854775807),
            'fecha_recepcion' => $this->faker->date('Y-m-d'),
            'problema' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'fecha_diagnostico' => $this->faker->date('Y-m-d'),
            'diagnostico' => $this->faker->text($this->faker->numberBetween(5, 45)),
            'fecha_entrega' => $this->faker->date('Y-m-d'),
            'solucion' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
