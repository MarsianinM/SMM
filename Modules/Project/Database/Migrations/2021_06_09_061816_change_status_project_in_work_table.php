<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeStatusProjectInWorkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE project_in_work MODIFY COLUMN status ENUM('in_work','in_check','verified','rejected','refused','for_revision') DEFAULT 'in_work'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE project_in_work MODIFY COLUMN status ENUM('in_work','in_check','verified','rejected','refused') DEFAULT 'in_work'");
    }
}
