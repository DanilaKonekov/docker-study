<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('concurrency', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_card_id');
            $table->unsignedBigInteger('source_item_id');

            $table->foreign('product_card_id')->references('id')->on('product_cards')->onDelete('cascade');
            $table->foreign('source_item_id')->references('id')->on('source_items')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('concurrency');
    }
};
