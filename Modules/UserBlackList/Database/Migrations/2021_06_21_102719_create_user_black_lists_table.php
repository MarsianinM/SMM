<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBlackListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('blacklists');
        Schema::create('user_black_lists', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['author','client','massage'])->default('author');
            $table->text('description')->nullable();
            $table->foreignId('client_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
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
        Schema::dropIfExists('user_black_lists');
    }
}
