<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("name_ar")->nullable();
            $table->string("name_en")->nullable();
            $table->string("description")->nullable();
            $table->string("keyword")->nullable();
            $table->string("icon")->nullable();
            $table->unsignedBigInteger("parent")->nullable();
            $table->foreign("parent")->references("id")->on("categories")->onUpdate("cascade")->onDelete("cascade");
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
        Schema::dropIfExists('categories');
    }
}
