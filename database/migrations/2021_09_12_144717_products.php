<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('products', function (Blueprint $table) {
            $table->increments('prod_id')->unique();
            $table->string('prod_name');
            $table->double('prod_price_now', 5,2);
            $table->double('prod_prev_price', 5,2)->default(0);
            $table->double('prod_rating', 2,1);
            $table->string('prod_image_name');
            $table->boolean('prod_new');    
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
        //
    }
}
