<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEnumValueCompletedProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE projects MODIFY COLUMN status ENUM('bay_off','active','on_moderation','off','off_admins','completed') DEFAULT 'active'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE projects MODIFY COLUMN status ENUM('bay_off','active','on_moderation','off','off_admins') DEFAULT 'active'");
    }
}
