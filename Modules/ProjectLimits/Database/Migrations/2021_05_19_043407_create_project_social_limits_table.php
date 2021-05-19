<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectSocialLimitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_social_limits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')
                ->nullable()
                ->constrained('projects')
                ->cascadeOnDelete();
            //VK
            $table->enum('vk_check',[0,1])->default(0);
            $table->integer('vk_friends')->nullable();
            $table->enum('vk_female',['female_not','female_man','female_women',])->default('female_not');
            $table->integer('vk_age_min')->nullable();
            $table->integer('vk_age_max')->nullable();
            //OK
            $table->enum('ok_check',[0,1])->default(0);
            $table->integer('ok_friends')->nullable();
            $table->enum('ok_female',['female_not','female_man','female_women',])->default('female_not');
            $table->integer('ok_age_min')->nullable();
            $table->integer('ok_age_max')->nullable();
            //FB
            $table->enum('fb_check',[0,1])->default(0);
            $table->enum('fb_female',['female_not','female_man','female_women',])->default('female_not');
            $table->integer('fb_age_min')->nullable();
            $table->integer('fb_age_max')->nullable();
            //INSTAGRAM
            $table->enum('inst_check',[0,1])->default(0);
            $table->integer('count_subscribers')->nullable();
            //TWEETER
            $table->enum('tw_check',[0,1])->default(0);
            $table->integer('count_followers')->nullable();
            //
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
        Schema::dropIfExists('project_social_limits');
    }
}
