<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Area>
 */
class AreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static $Areanames = ['ACIDIFICACION', 'ADMINISTRACIÓN', 'Almacenes','Logistica','LABORATORIO'];
    public function definition(): array
    {
        $Areaname = $this->faker->unique()->randomElement(static::$Areanames);
        static::$Areanames[] = $Areaname ;
        return [
            'area_name' => $Areaname,
        ];
    }
}
