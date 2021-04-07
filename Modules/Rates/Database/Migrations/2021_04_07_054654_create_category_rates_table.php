<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('category_rates');
        Schema::create('category_rates', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->integer('sort_order')->default(0);
            $table->enum('active', [0,1])->default(1);
            $table->timestamps();
        });
        Schema::create('category_rate_description', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->constrained('category_rates')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->text('lang_key');
            $table->text('title');
            $table->longText('content');
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
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
        Schema::dropIfExists('category_rates');
    }
}
