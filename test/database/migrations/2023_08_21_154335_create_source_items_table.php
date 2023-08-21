<?php

namespace App;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('source_items', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->decimal('wholesale_price', 10, 2)->nullable();
            $table->decimal('retail_price', 10, 2)->nullable();
            $table->string('article');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('source_items');
    }
};
