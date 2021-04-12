<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('rates');
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->integer('price_min')->default(0);
            $table->integer('price_max')->default(0);
            $table->integer('sort_order')->default(0);
            $table->enum('active', [0,1])->default(1);
            $table->foreignId('category_id')
                ->constrained('category_rates')
                ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('rate_description', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rate_id')
                ->constrained('rates')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->text('lang_key');
            $table->text('title');
            $table->text('description')->nullable();
            $table->text('help_text')->nullable();
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
        Schema::dropIfExists('rates');
        Schema::dropIfExists('rate_description');
    }
}
