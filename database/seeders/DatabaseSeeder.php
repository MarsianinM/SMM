<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

//        User::create([
//            'name' => 'Тест',
//            'email' => 'testaccount@smm.ua',
//            'password' => Hash::make('11111111'),
//            'email_verified_at' => now(),
//        ]);
    }
}
