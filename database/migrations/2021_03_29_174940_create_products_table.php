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
          $table->string('name');
          $table->string('slug');
          $table->text('description');
          $table->text('presentation');
          $table->text('technology');
          $table->boolean('active');
          $table->unsignedBigInteger('category');
          $table->timestamps();

          //keys
          $table->unique('slug');
          $table->foreign('category')
            ->references('id')
            ->on('categories')
            ->onDelete('RESTRICT');
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
