<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Infrastructures\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Auth::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'test@admin.com',
            'role' => UserRoleEnum::Admin->value
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => UserRoleEnum::User->value
        ]);
    }
}
