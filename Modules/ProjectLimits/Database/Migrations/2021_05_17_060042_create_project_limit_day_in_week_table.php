<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectLimitDayInWeekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_limit_day_in_week', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')
                ->nullable()
                ->constrained('projects')
                ->cascadeOnDelete();
            $table->enum('monday',[0,1])->default(0);
            $table->enum('tuesday',[0,1])->default(0);
            $table->enum('wednesday',[0,1])->default(0);
            $table->enum('thursday',[0,1])->default(0);
            $table->enum('friday',[0,1])->default(0);
            $table->enum('saturday',[0,1])->default(0);
            $table->enum('sunday',[0,1])->default(0);
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
        Schema::dropIfExists('project_limit_day_in_week');
    }
}
