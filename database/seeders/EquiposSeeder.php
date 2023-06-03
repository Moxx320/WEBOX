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
        $equipos = [
            'Equipo 1',
            'Equipo 2',
            'Equipo 3',
            'Equipo 4',
            'Equipo 5',
            'Equipo 6',
            'Equipo 7',
            'Equipo 8',
            'Equipo 9',
            'Equipo 10',
            'Equipo 11',
            'Equipo 12',
            'Equipo 13',
            'Equipo 14',
            'Equipo 15',
            'Equipo 16',
            'Equipo 17',
            'Equipo 18',
            'Equipo 19',
            'Equipo 20',
            'Equipo 21',
            'Equipo 22',
            'Equipo 23',
            'Equipo 24',
            'Equipo 25',
            'Equipo 26',
            'Equipo 27',
            'Equipo 28',
            'Equipo 29',
            'Equipo 30',
        ];
        
        foreach ($equipos as $equipo) {
            Equipo::create(['nombre' => $equipo]);
        }
        
    }
}
