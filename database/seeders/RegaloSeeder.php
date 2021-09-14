<?php

namespace Database\Seeders;

use App\Models\Regalo;
use Illuminate\Database\Seeder;

class RegaloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Regalo::create([
            'descripcion' => 'Pulseras'
        ]);
        Regalo::create([
            'descripcion' => 'Etiquetas'
        ]);
        Regalo::create([
            'descripcion' => 'Plumas'
        ]);
    }
}
