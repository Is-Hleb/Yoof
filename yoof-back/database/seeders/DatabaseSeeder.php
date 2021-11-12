<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1000)->create();
        $user = User::create([
            'email' => 'admin@admin.admin',
            'password' => Hash::make('adminadmin'),
            'email_verified_at' => now(),
            'role' => 'admin',
            'remember_token' => Str::random(10),
            'api_token' => Str::random(60),
            'status' => rand(0, 1) == 1,
        ]);
        UserData::create([
            'name' => 'admin',
            'surname' => 'admin',
            'patronymic' => 'admin',
            'user_id' => $user->id,
        ]);
    }
}
