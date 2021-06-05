<?php

namespace Modules\ProjectVip\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ProjectVip\Entities\ProjectVipTariff;

class ProjectVipDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        ProjectVipTariff::factory()->times(1)->create();
    }
}
