<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("name_en")->nullable();
            $table->string("name_ar")->nullable();
            $table->string("email")->nullable();
            $table->string("facebook")->nullable();
            $table->string("logo")->nullable();
            $table->string("time_work")->nullable();
            $table->string("address")->nullable();
            $table->string("phone")->nullable();
            $table->text("description")->nullable();
            $table->text("keywords")->nullable();
            $table->enum("status",["open","close"]);
            $table->string("message")->nullable();
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
        Schema::dropIfExists('settings');
    }
}
