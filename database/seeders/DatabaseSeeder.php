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
        DB::table('users')->insert(
            [
                'name' => 'Тест',
                'email' => 'testaccount@smm.ua',
                'password' => '$argon2id$v=19$m=1024,t=2,p=2$TEQyWjBZcGVkWWZLN2JpTA$/HVhobcctdWTwdhNNPIp0EJRWFfuY1O2j1w+g+S4vjc',//Hash::make('11111111'),
                'email_verified_at' => now(),
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
