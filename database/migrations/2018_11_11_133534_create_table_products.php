<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
        	$table->increments('id');
        	$table->string('name', 255);
        	$table->float('price');
        	$table->float('price_sell');
        	$table->tinyInteger('rate');
        	$table->integer('sold');
        	$table->text('description');
        	$table->integer('category_id');
        	$table->date('exp_date');
        	$table->text('properties');
        	$table->integer('stock');
        	$table->string('size', 5);
        	$table->string('brand_name', 20);
			$table->tinyInteger('deleted')->default(0);
			$table->string('created_by', 20)->default('System');
			$table->string('updated_by', 20)->default('System');
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
		Schema::dropIfExists('products');
    }
}
