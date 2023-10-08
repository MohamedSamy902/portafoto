<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->unsignedInteger('standard_color_id');
            $table->foreign('standard_color_id')->references('id')->on('standard_colors')->onDelete('cascade');

            $table->unsignedInteger('invoice_id')->nullable();
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');


            $table->string('size')->nullable();
            $table->float('price')->nullable();
            $table->float('totalPrice')->nullable();


            $table->integer('quantity')->default(1);

            $table->string('customerId');
            $table->enum('status', ['outInvoice', 'inInvoice'])->default('outInvoice');
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
        Schema::dropIfExists('carts');
    }
};
