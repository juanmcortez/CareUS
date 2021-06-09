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

            $table->enum('owner_type', ['patient', 'persona', 'contact', 'employment', 'subscriber', 'insurance']);
            $table->unsignedBigInteger('owner_id');

            $table->enum('level', ['primary', 'secondary', 'tertiary'])->default('primary');
            $table->unsignedBigInteger('company_id')->nullable();

            $table->string('policy_number', 16)->nullable();
            $table->string('group_number', 16)->nullable();
            $table->string('plan_name', 32)->nullable();

            $table->string('ins_relation', 16)->default('self')->nullable();
            $table->integer('patient_copay')->default(0)->nullable();
            $table->string('accept_assignment')->default('no')->nullable();
            $table->string('secondary_medical_type', 32)->nullable();

            $table->date('effective_date')->nullable();
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
