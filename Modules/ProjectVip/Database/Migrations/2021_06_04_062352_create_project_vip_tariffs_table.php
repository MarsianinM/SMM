<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectVipTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_vip_tariffs', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount');
            $table->foreignId('currency_id')
                ->nullable()
                ->constrained('currency')
                ->nullOnDelete();
            $table->integer('days')->default(1);
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
        Schema::dropIfExists('project_vip_tariffs');
    }
}
