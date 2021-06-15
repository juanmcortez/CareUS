<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();

            $table->enum('owner_type', ['user', 'patient', 'persona', 'contact', 'employment', 'subscriber', 'insurance']);
            $table->unsignedBigInteger('owner_id');

            $table->unsignedBigInteger('user_id')->default(1);

            $table->string('category', 32)->default('patient');
            $table->string('title', 64)->nullable();
            $table->longText('body')->nullable();

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
        Schema::dropIfExists('notes');
    }
}
