<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Registro;
use Database\Factories\RegistroFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CategoriaSeeder::class);
        $this->call(InvitadoSeeder::class);
        $this->call(RegaloSeeder::class);
        $this->call(UserSeeder::class);
        Evento::factory(50)->create();
        $this->call(RegistroSeeder::class);
    }
}
