<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('mothers_last_name')->nullable(true);
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedInteger("systemRole_id");
            $table->unsignedInteger("role_id");
            $table->tinyInteger('status')->default(1);
            $table->decimal('points', 10, 2);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('systemRole_id')->references('id')->on('cat_systemUserRole');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
