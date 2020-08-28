<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('user_id')->nullable()->index();
            $table->bigIncrements('shipping_address_id')->nullable()->index();
            $table->bigIncrements('billing_address_id')->nullable()->index();
            $table->boolean('placed')->default(false)->index();
            $table->boolean('processed')->default(false)->index();
            $table->boolean('shipped')->default(false)->index();
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
        Schema::dropIfExists('orders');
    }
}
