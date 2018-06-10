<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('imagePath')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->integer('status')->default(0);
            $table->integer('parent_id')->nullable();
            $table->integer('price')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('related_products');
    }
}
