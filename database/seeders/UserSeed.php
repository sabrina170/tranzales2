<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            're_password' => 123,
            'estado' => 1,
            'apellido_pa' => 'Nuñez',
            'apellido_ma' => 'Alvarez',
            'tipo_dni' => 1,
            'dni' => 76232414,
            'celular' => 987912688,
            'tipo' => 1
        ])->assignRole('admin');

        User::create([
            'name' => 'sabrina',
            'email' => 'sabrina@gmail.com',
            'password' => Hash::make('123'),
            're_password' => 123,
            'estado' => 1,
            'apellido_pa' => 'Pomajulca',
            'apellido_ma' => 'Razabal',
            'tipo_dni' => 1,
            'dni' => 76232414,
            'celular' => 987912688,
            'tipo' => 2
        ])->assignRole('operario');

        User::create([
            'name' => 'gerente',
            'email' => 'gerente@gmail.com',
            'password' => Hash::make('123'),
            're_password' => 123,
            'estado' => 1,
            'apellido_pa' => 'Pomajulca',
            'apellido_ma' => 'Razabal',
            'tipo_dni' => 1,
            'dni' => 76232414,
            'celular' => 987912688,
            'tipo' => 3
        ])->assignRole('gerente');
    }
}
