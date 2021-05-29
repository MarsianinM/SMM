<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalanceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('balance_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->decimal('amount','8',2)->default(0);
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('currency_id')
                ->constrained('currency')
                ->cascadeOnDelete();
            $table->json('project_detail')->nullable();
            $table->enum('payment_method',['WebMoney','visa','QiwiWallet','mastercard','MonoBank','GooglePay','ApplePay','Privat24']);
            $table->enum('type',['insert','output','project_bay'])->default('insert');
            $table->enum('status',['executed','in_processing','rejected'])->default('in_processing');
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
        Schema::dropIfExists('balance_histories');
    }
}
