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
        DB::table('project_group')->insert([
            [
                'name'                  => 'Категория 1',
                'user_id'               => 1,
                'parent_id'             => 0,
                'show'                  => 1,
                'show_children_group'   => 1,
            ],
            [
                'name'                  => 'Вторая категория',
                'user_id'               => 1,
                'parent_id'             => 0,
                'show'                  => 1,
                'show_children_group'   => 1,
            ],
            [
                'name'                  => 'Третья категория',
                'user_id'               => 1,
                'parent_id'             => 0,
                'show'                  => 1,
                'show_children_group'   => 1,
            ]]);
        // $this->call("OthersTableSeeder");
    }
}
