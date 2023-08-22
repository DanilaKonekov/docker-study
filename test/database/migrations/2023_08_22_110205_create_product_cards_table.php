<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('article_number');
            $table->decimal('retail_price', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_cards');
    }
};
