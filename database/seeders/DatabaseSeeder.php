<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role=Role::create([
            'name' => 'Super Admin'
        ]);

        User::factory()->create([
            'role_id'=>$role->id,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' =>bcrypt('654321')
        ]);
    }
}
