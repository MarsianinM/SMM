<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeEnumBalanceHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE balance_histories MODIFY COLUMN payment_method ENUM('WebMoney','visa','QiwiWallet','mastercard','MonoBank','GooglePay','ApplePay','Privat24','project_bay','project_payment')");
        DB::statement("ALTER TABLE balance_histories MODIFY COLUMN type ENUM('insert','output','project_bay','project_payment') DEFAULT 'insert'");
        DB::statement("ALTER TABLE balance_histories MODIFY COLUMN status ENUM('executed','in_processing','rejected','project_bay','project_payment') DEFAULT 'in_processing'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        DB::statement("ALTER TABLE balance_histories MODIFY COLUMN payment_method ENUM('WebMoney','visa','QiwiWallet','mastercard','MonoBank','GooglePay','ApplePay','Privat24','project_bay')");
        DB::statement("ALTER TABLE balance_histories MODIFY COLUMN type ENUM('insert','output','project_bay') DEFAULT 'insert'");
        DB::statement("ALTER TABLE balance_histories MODIFY COLUMN status ENUM('executed','in_processing','rejected','project_bay') DEFAULT 'in_processing'");
    }
}
