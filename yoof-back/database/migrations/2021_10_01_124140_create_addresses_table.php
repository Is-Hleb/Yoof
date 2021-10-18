<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('index')->nullable();
            $table->string('city')->nullable();
            $table->string('rayon')->nullable();
            $table->string('settlement')->nullable();
            $table->string('street')->nullable();
            $table->string('house')->nullable();
            $table->string('frame')->nullable();
            $table->string('entrance')->nullable();
            $table->string('floor')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('addresses');
    }
}
