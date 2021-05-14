<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectLimitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_limits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')
                ->nullable()
                ->constrained('projects')
                ->cascadeOnDelete();
            $table->json('day_active')->nullable();
            $table->time('time_start')->nullable();
            $table->time('time_finish')->nullable();
            $table->integer('max_works')->nullable();
            $table->integer('max_works_day')->nullable();
            $table->integer('time_off_min')->nullable();
            $table->integer('time_off_max')->nullable();
            $table->integer('in_hour')->nullable();
            $table->integer('in_page')->nullable();
            $table->integer('in_page_on_day')->nullable();
            $table->integer('author_count')->nullable();
            $table->integer('author_count_on_day')->nullable();
            $table->integer('author_count_in_group_project')->nullable();
            $table->integer('author_count_in_group_project_on_day')->nullable();
            $table->integer('count_in_ip')->nullable();
            $table->integer('max_author_work')->nullable();
            $table->integer('time_off_in_work')->nullable();
            $table->enum('mobile',[0,1])->default(0);
            $table->mediumText('stop_words')->nullable();
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
        Schema::dropIfExists('project_limits');
    }
}
