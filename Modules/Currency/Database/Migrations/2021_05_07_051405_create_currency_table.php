<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('code');
            $table->text('symbol')->nullable();
            $table->char('decimal_place')->nullable()->comment('A number of symbols after comma');
            $table->float('value')->default()->nullable()->comment('The value is needed for currency conversion');
            $table->enum('status',[0,1])->default(1);
            $table->enum('activate',[0,1])->default(1);
            $table->integer('sort')->default(0);
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
        Schema::dropIfExists('currency');
    }
}
