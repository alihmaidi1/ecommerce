<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->string("name_ar")->nullable();
            $table->string("name_en")->nullable();
            $table->string("address")->nullable();
            $table->string("person")->nullable();
            $table->integer("phone")->nullable();
            $table->string("facebook")->nullable();
            $table->string("website")->nullable();
            $table->string("icon")->nullable();
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
        Schema::dropIfExists('tracks');
    }
}
