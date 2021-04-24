<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();

            $table->enum('owner_type', ['patient', 'persona', 'contact', 'employment', 'subscriber']);
            $table->unsignedBigInteger('owner_id');

            $table->string('title', 8)->nullable();
            $table->string('first_name', 32);
            $table->string('middle_name', 32)->nullable();
            $table->string('last_name', 32);

            $table->string('email', 64)->nullable();

            $table->date('date_of_birth')->default(now(config('app.timezone')));
            $table->string('gender', 12)->default('male');

            $table->string('social_security', 16)->nullable();
            $table->string('driver_license', 16)->nullable();

            $table->string('marital', 32)->nullable();
            $table->string('marital_details', 128)->nullable();

            $table->string('language', 5)->default(config('app.locale'));
            $table->string('ethnicity', 16)->nullable();
            $table->string('race', 16)->nullable();

            $table->string('referral', 16)->nullable();
            $table->string('vfc', 16)->nullable();

            $table->string('family_size', 16)->nullable();

            $table->string('financial_review', 64)->nullable();
            $table->string('migrant_seasonal', 64)->nullable();
            $table->string('interpreter', 64)->nullable();
            $table->string('homeless', 64)->nullable();

            $table->date('desease_date')->nullable();
            $table->string('desease_reason', 64)->nullable();

            // Contact only fields
            $table->enum('contact_type', [null, 'mother', 'father', 'guardian', 'relative', 'other'])
                ->nullable()
                ->comment('Use this field only when adding a "contact" persona.');

            // Employment only fields
            $table->string('company', 32)
                ->nullable()
                ->comment('Use this field only when adding a "employment" persona.');
            $table->string('occupation', 64)
                ->nullable()
                ->comment('Use this field only when adding a "employment" persona.');

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
        Schema::dropIfExists('personas');
    }
}
