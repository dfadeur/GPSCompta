<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLignesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('quantity');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('produits');
            $table->integer('facture_id')->unsigned();
            $table->foreign('facture_id')->references('id')->on('factures');

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
        Schema::drop('lignes');
    }
}
