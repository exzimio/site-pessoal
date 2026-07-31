<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'ola@alexandremagno.dev');
        $password = env('ADMIN_PASSWORD');

        if (! $password) {
            throw new \RuntimeException(
                'Define ADMIN_PASSWORD no ficheiro .env antes de correr o seeder.'
            );
        }

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Alexandre Magno',
                'password' => Hash::make($password),
            ]
        );
    }
}
