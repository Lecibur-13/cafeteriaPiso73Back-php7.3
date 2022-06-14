<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CatUserSystemUserRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if(!Schema::hasTable('cat_systemUserRole')){
            Schema::create('cat_systemUserRole', function(Blueprint $table){
                $table->increments('id');
                $table->string('name', 40)->nullable();
                $table->string('code', 20)->nullable();
                $table->string('description')->nullable();

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
        Schema::dropIfExists("cat_systemUserRole");
    }
};
