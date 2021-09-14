<?php

namespace Database\Seeders;

use App\Models\Pedido;
use App\Models\Registro;
use Illuminate\Database\Seeder;

class RegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Registro::factory(50)->create();
        Registro::find(1)->pedido()->create([
            'boletos_un_dia' => 2,
            'regalo_id' => 3,
        ]);
        Registro::find(2)->pedido()->create([
            'boletos_completo' => 2,
            'regalo_id' => 2
        ]);
        Registro::find(3)->pedido()->create([
            'boletos_dos_dias' => 1,
            'camisas' => 2,
            'etiquetas' => 3,
            'regalo_id' => 1,
        ]);
        for ($i = 4; $i <= 50; $i++) {
            $registro = Registro::find($i);
            $registro->pedido()->create([
                'boletos_un_dia' => 1,
                'regalo_id' => 2
            ]);
            $registro->eventos()->attach($i);
        }
    }
}
