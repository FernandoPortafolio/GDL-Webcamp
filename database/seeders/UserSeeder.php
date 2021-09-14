<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Fernando Acosta',
            'email' => 'root@root.com',
            'password' => Hash::make('123'),
            'email_verified_at' => Carbon::now(),
            'image' => 'admins/admin1.jpeg'
        ]);
    }
}
