<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id('subID');

            $table->enum('owner_type', ['patient', 'persona', 'contact', 'employment', 'subscriber']);
            $table->unsignedBigInteger('owner_id');

            $table->enum('level', ['primary', 'secondary', 'tertiary'])->default('primary');
            $table->unsignedBigInteger('company');

            $table->string('policy_number', 16);
            $table->string('group_number', 16)->nullable();
            $table->string('plan_name', 32)->nullable();

            $table->integer('patient_copay')->default(0);
            $table->boolean('accept_assignment')->default(false);
            $table->string('secondary_medical_type', 32)->nullable();

            $table->date('effective_date')->default(now(config('app.timezone')));
            $table->date('termination_date')->nullable();

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
        Schema::dropIfExists('subscribers');
    }
}
