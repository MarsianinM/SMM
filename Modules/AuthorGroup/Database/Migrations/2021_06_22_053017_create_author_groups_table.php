<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('author_groups', function (Blueprint $table) {
            $table->text('description')->nullable();
        });
    }
//'id', 'client_id', 'name', 'description',
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('author_groups', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}
