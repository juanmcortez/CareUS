<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id('insID');

            $table->string('company_name', 96);
            $table->string('group_name', 32)->nullable();
            $table->string('attention', 64)->nullable();

            $table->date('effective_date')->nullable();
            $table->date('termination_date')->nullable();

            $table->boolean('participating')->default(false);
            $table->boolean('do_not_bill')->default(false);
            $table->boolean('do_not_import')->default(false);

            $table->string('payerID', 32)->nullable();
            $table->string('payer_type', 32)->nullable();
            $table->string('financial_class', 32)->default('self_pay');
            $table->string('payment_code', 32)->nullable();

            $table->unsignedBigInteger('x12_partner_id')->nullable();

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
        Schema::dropIfExists('companies');
    }
}
