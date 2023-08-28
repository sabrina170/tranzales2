<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $operario = Role::create(['name' => 'operario']);
        // $postchofer = Role::create(['name' => 'chofer']);
        $admin = Role::create(['name' => 'admin']);
        // $ayudante = Role::create(['name' => 'ayudante']);
        $gerente = Role::create(['name' => 'gerente']);


        //estudiante, admin son vistas
        // Permission::create(['name' => 'solicitud.index'])->assignRole($operario);
        Permission::create(['name' => 'admin.solicitudes.index'])->assignRole($admin, $gerente, $operario);
    }
}
