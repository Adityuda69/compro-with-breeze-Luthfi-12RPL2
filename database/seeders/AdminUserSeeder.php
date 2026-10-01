<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $password = config('seeding.admin.password');

        if (! is_string($password) || trim($password) === '') {
            throw new RuntimeException('Set ADMIN_PASSWORD in .env before running the database seeders.');
        }

        User::updateOrCreate(
            ['email' => config('seeding.admin.email')],
            [
                'name' => config('seeding.admin.name'),
                'password' => Hash::make($password),
                'email_verified_at' => now(),
            ],
        );
    }
}
