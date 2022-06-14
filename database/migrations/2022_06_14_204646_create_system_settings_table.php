<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systemSettings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 30)->unique()->nullable(false);
            $table->string('description', 200)->nullable(false);
            $table->string('title', 50)->nullable(false);
            $table->text('value')->nullable();

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
        Schema::dropIfExists('systemSettings');
    }
}
