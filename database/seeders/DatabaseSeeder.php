<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::create([
            'prefixname' => 'Mr',
            'firstname' => 'Muhsin',
            'middlename' => null,
            'lastname' => 'Salam',
            'suffixname' => null,
            'username' => 'Muhsin',
            'email' => 'super@admin.com',
            'password' => Hash::make('super@admin'),
            'photo' => null,
            'type' => 'superadmin',
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ]);
    }
}
