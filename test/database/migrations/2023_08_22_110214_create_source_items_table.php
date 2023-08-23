<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('source_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('opt_price', 8, 2);
            $table->decimal('retail_price', 8, 2)->default(null);
            $table->string('article_number');
            $table->unsignedBigInteger('product_card_id');
            $table->timestamps();

            $table->foreign('product_card_id')->references('id')->on('product_cards')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('source_items');
    }
};
