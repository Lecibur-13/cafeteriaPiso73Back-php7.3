<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CatUserRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if(!Schema::hasTable('cat_userRole')){
            Schema::create('cat_userRole', function(Blueprint $table){
                $table->increments('id');
                $table->string('name', 20)->nullable(false);
                $table->string('code', 20)->nullable(false);
                $table->string('description', 100)->nullable(false);

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_userRole');
    }
};
