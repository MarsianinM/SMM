<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn('projects', 'pro')){
            Schema::table('projects', function (Blueprint $table){
                $table->dropColumn('pro');
            });
        }

        if(Schema::hasColumn('projects', 'project_vip_id')){
            Schema::table('projects', function (Blueprint $table){
                $table->dropColumn('project_vip_id');
            });
        }

        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('project_vip_id')
                ->constrained('project_vips')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('project_vip_id');
            $table->boolean('pro')->default(0);
        });
    }
}
