<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();

            $table->enum('owner_type', ['patient', 'persona', 'contact', 'employment', 'subscriber', 'insurance']);
            $table->unsignedBigInteger('owner_id');

            $table->enum('type', ['home', 'cellphone', 'work', 'emergency', 'family', 'relative'])->default('home')->nullable();
            $table->string('international_code', 3)->default('1')->nullable();

            $table->string('area_code', 3)->default('000')->nullable();
            $table->string('initial_digits', 3)->default('000')->nullable();
            $table->string('last_digits', 4)->default('0000')->nullable();

            $table->string('extension', 4)->nullable();

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
        Schema::dropIfExists('phones');
    }
}
