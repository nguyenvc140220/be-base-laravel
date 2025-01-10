<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Infrastructures\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'test@admin.com',
            'role' => UserRoleEnum::Admin->value
        ]);
        User::factory()->create([
            'email' => 'test@example.com',
            'role' => UserRoleEnum::User->value
        ]);
    }
}