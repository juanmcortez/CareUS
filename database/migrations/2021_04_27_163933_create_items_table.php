<?php

use Database\Seeders\ListsItemsSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->enum('list_item_type', ['parent', 'child', 'sub_parent', 'sub_child']);

            $table->string('list_item_master', 64)->comment('ex: countries');
            $table->string('list_item_name', 64)->comment('ex: List of Countries');
            $table->string('list_item_value', 64)->comment('ex: US');
            $table->string('list_item_title', 96)->comment('ex: United States');

            $table->boolean('list_item_default')->default(false);
            $table->integer('list_item_order')->default(1);

            $table->softDeletes();
            $table->timestamps();
        });

        /**
         * After creating the table feed some values.
         */
        $tableSeeder = new ListsItemsSeeder;
        $tableSeeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
