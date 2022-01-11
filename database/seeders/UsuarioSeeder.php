<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Perla',
            'email' => 'emyeolren@gmail.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://haliuren.com',
        ]);

        $user2 = User::create([
            'name' => 'Gustavo',
            'email' => 'gusft@gmail.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://haliuren.com',
        ]);

    }
}
