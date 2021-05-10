<?php

namespace Modules\Project\Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProjectDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('author_groups')->insert([
        [
            'name'                  => 'Аутор груп 1',
            'client_id'             => 1,
        ],
        [
            'name'                  => 'Аутор груп 2',
            'client_id'             => 1,
        ],
        [
            'name'                  => 'Аутор груп 4',
            'client_id'             => 1,
        ]]);
        // $this->call("OthersTableSeeder");
    }
}
