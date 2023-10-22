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
            $table->string('code');
            $table->string('title');
            $table->string('photo');
            $table->decimal('price_1',25,2);
            $table->decimal('price_2',25,2);
            $table->decimal('price_3',25,2);
            $table->text('description')->nullable();
            $table->unsignedbiginteger('product_category_id')->nullable();
            $table->foreign('product_category_id')->references('id')->on('product_categories');
            $table->unsignedbiginteger('product_flavour_id')->nullable();
            $table->foreign('product_flavour_id')->references('id')->on('product_flavours');
            $table->unsignedbiginteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedbiginteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
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
