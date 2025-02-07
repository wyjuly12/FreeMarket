<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('goods');
            $table->integer('price');
            $table->string('image');
            $table->string('explanation');
            $table->foreignId('condition_id')->constrained()->cascadeOnDelete();
            $table->string('postcode')->nullable();
            $table->string('address')->nullable();
            $table->string('payment')->nullable();
            $table->integer('sell_flag');
            $table->integer('buy_flag')->nullable();
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
        Schema::dropIfExists('items');
    }
}
