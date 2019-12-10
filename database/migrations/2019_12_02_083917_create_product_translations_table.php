<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_sku');
            $table->string('country_code')->default('dk');
            $table->string('title');
            $table->text('description');
            $table->string('description_list')->nullable();
            $table->string('package_contains')->nullable();
            $table->string('translated_by')->nullable();
            $table->timestamps();
            $table->foreign('product_sku')
                ->references('sku')->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_translations');
    }
}
