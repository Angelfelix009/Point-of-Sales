<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('goods_id');
            $table->integer('quantity');
            $table->string('unit');
            $table->date('date_purchased')->nullable();
            $table->string('user');
            $table->boolean('swap_status');
            $table->foreign('goods_id')->references('id')->on('goods')->onDelete('cascade');
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
        Schema::dropIfExists('inventories');
    }
}
