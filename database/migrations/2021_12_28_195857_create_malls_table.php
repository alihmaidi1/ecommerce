<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('malls', function (Blueprint $table) {
            $table->id();
            $table->string("name_ar")->nullable();
            $table->string("name_en")->nullable();
            $table->string("person")->nullable();
            $table->string("email")->nullable();
            $table->string("mobile")->nullable();
            $table->string("address")->nullable();
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
        Schema::dropIfExists('malls');
    }
}
