<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('history_transaction')) {
            Schema::create('history_transaction', function (Blueprint $table) {
                $table->increments('id');
                $table->decimal('total', 10, 2);
                $table->decimal('discount', 10, 2);
                $table->decimal('money_cash', 10, 2);
                $table->decimal('points', 10, 2);
                $table->unsignedInteger("user_id");
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_transaction');
    }
}
