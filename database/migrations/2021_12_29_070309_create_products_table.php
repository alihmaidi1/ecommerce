<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("title_en")->nullable();
            $table->string("title_ar")->nullable();
            $table->string("content_en")->nullable();
            $table->string("content_ar")->nullable();
            $table->integer("rating")->default("5");
            $table->unsignedBigInteger("department_id")->nullable();
            $table->foreign("department_id")->references("id")->on("categories")->onUpdate("cascade")->onDelete("cascade");
            $table->integer("price")->nullable();
            $table->string("photo")->nullable();
            $table->integer("numbers")->nullable();
            $table->double("tax")->nullable();
            $table->double("shipping")->nullable();
            $table->date("start_offer_at")->nullable();
            $table->integer("price_offer")->nullable();
            $table->date("end_offer_at")->nullable();
            $table->unsignedBigInteger("factory_id")->nullable();
            $table->foreign("factory_id")->references("id")->on("factories")->onUpdate("cascade")->onDelete("cascade");
            $table->string("status")->nullable();
            $table->integer("number_selled")->default(0);
            $table->string("weight")->nullable();
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
        Schema::dropIfExists('products');
    }
}
