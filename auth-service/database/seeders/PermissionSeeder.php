<?php

namespace Database\Seeders;

use App\Domain\Authentication\Entities\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'create_data',
        ]);
        Permission::create([
            'name' => 'read_data',
        ]);
        Permission::create([
            'name' => 'update_data',
        ]);
        Permission::create([
            'name' => 'delete_data',
        ]);
    }
}
