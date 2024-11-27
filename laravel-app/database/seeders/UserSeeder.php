<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserFactory::new()->create([
            'email' => 'test@admin.com',
            'role' => UserRoleEnum::Admin->value
        ]);
        UserFactory::new()->create([
            'email' => 'test@example.com',
            'role' => UserRoleEnum::User->value
        ]);
    }
}
