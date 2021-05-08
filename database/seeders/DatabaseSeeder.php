<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Eloquent\Model;
use Modules\Users\Entities\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //$this->call(RoleSeeder::class);
        //$this->call(SettingSeeder::class);
        DB::table('roleables')->insert([
                [
                    'role_id' => 1,
                    'roleable_type' => 'Modules\\Users\\Entities\\User',
                    'roleable_id' => 1,
                    'is_active' => 1,
                ],
                [
                    'role_id' => 2,
                    'roleable_type' => 'Modules\\Users\\Entities\\User',
                    'roleable_id' => 1,
                    'is_active' => 0,
                ],
                [
                    'role_id' => 3,
                    'roleable_type' => 'Modules\\Users\\Entities\\User',
                    'roleable_id' => 1,
                    'is_active' => 0,
                ],
            ]
            );
        /*User::create([
            'name' => 'Тест',
            'email' => 'testaccount@smm.ua',
            'password' => \Hash::make('11111111'),
            'email_verified_at' => now(),
        ]);*/
    }
}
