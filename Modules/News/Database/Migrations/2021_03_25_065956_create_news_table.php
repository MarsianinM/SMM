<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->integer('sort_order')->default(0);
            $table->enum('active', [0,1])->default(1);
            $table->timestamps();
        });
        Schema::create('new_description', function (Blueprint $table) {
            $table->id();$table->foreignId('new_id')
                ->constrained('news')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->text('lang_key');
            $table->text('title');
            $table->text('quote')->nullable();
            $table->longText('content');
            $table->string('alt_img')->nullable();
            $table->string('title_img')->nullable();
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
        Schema::dropIfExists('news');
        Schema::dropIfExists('new_description');
    }
}
