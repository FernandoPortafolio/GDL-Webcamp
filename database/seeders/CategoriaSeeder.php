<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'categoria' => 'Seminarios', 
            'icono' => 'fas fa-university',
        ]);
        Categoria::create([
            'categoria' => 'Conferencias', 
            'icono' => 'fas fa-comment',
        ]);
        Categoria::create([
            'categoria' => 'Talleres', 
            'icono' => 'fas fa-code',
        ]);
    }
}
