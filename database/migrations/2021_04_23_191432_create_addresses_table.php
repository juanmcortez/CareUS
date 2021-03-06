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

            $table->enum('owner_type', ['patient', 'persona', 'contact', 'employment', 'subscriber', 'insurance']);
            $table->unsignedBigInteger('owner_id');

            $table->string('street', 64)->nullable();
            $table->string('street_extended', 64)->nullable();
            $table->string('city', 32)->nullable();
            $table->string('state', 4)->nullable();
            $table->string('zip', 12)->nullable();
            $table->string('country', 4)->nullable();

            $table->softDeletes();
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
