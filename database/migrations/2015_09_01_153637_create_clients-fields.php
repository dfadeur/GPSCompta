<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {

            $table->string('city')->nullable();
            $table->string('adress')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('mail')->nullable();
            $table->string('tva')->nullable();
            $table->boolean('client')->default(true);
            $table->boolean('supplier')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
