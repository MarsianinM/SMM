<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('link')->nullable();
            $table->boolean('moderation_comments')->default(0);
            $table->boolean('small_comments')->default(0);
            $table->boolean('screenshot')->default(0);
            $table->boolean('user_pro')->default(0);
            $table->longText('description');
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_finish')->nullable();
            $table->text('page_link')->nullable();
            $table->enum('status',['bay_off','active','on_moderation','off','off_admins'])->default('on_moderation');
            $table->boolean('archive')->default(0);
            $table->boolean('pro')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
