<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // database/seeders/RolePermissionSeeder.php
public function run() {
    $roles = [
        ['name' => 'admin', 'description' => 'Administrators'],
        ['name' => 'manager', 'description' => 'Vadītājs'],
        ['name' => 'user', 'description' => 'Parasts lietotājs']
    ];

    $permissions = [
        ['code' => 'user.manage', 'description' => 'Pārvaldīt lietotājus'],
        ['code' => 'settings.edit', 'description' => 'Rediģēt iestatījumus']
    ];

    // Pievieno datus tabulām un sasaistes
}
}
