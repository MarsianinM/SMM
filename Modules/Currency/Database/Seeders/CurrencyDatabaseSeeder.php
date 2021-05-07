<?php

namespace Modules\Currency\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Currency\Entities\Currency;

class CurrencyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();
        \DB::table('currency')->insert([[
                'title'             => 'Гривна',
                'code'              => 'UAH',
                'symbol'            => 'грн.',
                'decimal_place'     => 2,
                'value'             => 1,
                'status'            => 1,
                'activate'          => 1,
            ],
            [
                'title'             => 'Рубль',
                'code'              => 'RUB',
                'symbol'            => 'р.',
                'decimal_place'     => 2,
                'value'             => 1,
                'status'            => 1,
                'activate'          => 1,
            ],
            [
                'title'             => 'US Dollar',
                'code'              => 'USD',
                'symbol'            => '$',
                'decimal_place'     => 2,
                'value'             => 1,
                'status'            => 1,
                'activate'          => 1,
            ]]);
        //Currency::factory()->times(1)->create();
        // $this->call("OthersTableSeeder");
    }
}
