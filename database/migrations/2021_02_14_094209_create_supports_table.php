<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->string('theme')->nullable();
            $table->text('message');
            $table->foreignId('sender_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('receiver_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('parent_id')
                ->constrained('supports')
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
        Schema::dropIfExists('supports');
    }
}
