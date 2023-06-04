<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipo;

class EquiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Datos de ejemplo para los equipos
        $equipos = [
            [
                'nombre' => 'Equipo 1',
                'disponible' => true,
            ],
            [
                'nombre' => 'Equipo 2',
                'disponible' => true,
            ],
            [
                'nombre' => 'Equipo 3',
                'disponible' => true,
            ],
            [
                'nombre' => 'Equipo 4',
                'disponible' => true,
            ],
            [
                'nombre' => 'Equipo 5',
                'disponible' => true,
            ],
            [
                'nombre' => 'Equipo 6',
                'disponible' => true,
            ],
            [
                'nombre' => 'Equipo 7',
                'disponible' => true,
            ],
            [
                'nombre' => 'Equipo 8',
                'disponible' => true,
            ],
            [
                'nombre' => 'Equipo 9',
                'disponible' => true,
            ],
            [
                'nombre' => 'Equipo 10',
                'disponible' => true,
            ],
            // Agrega más equipos según tus necesidades
        ];

        // Crear los registros de equipos
        foreach ($equipos as $equipo) {
            Equipo::create($equipo);
        }
    }
}
