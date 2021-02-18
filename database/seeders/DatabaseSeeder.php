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

        User::create([
            'name' => 'Заказчик',
            'email' => 'client@smm.ua',
            'password' => Hash::make('11111111'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Автор',
            'email' => 'author@smm.ua',
            'password' => Hash::make('11111111'),
            'email_verified_at' => now(),
        ]);
    }
}
