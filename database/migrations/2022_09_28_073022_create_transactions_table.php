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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('issued_by');
            $table->string('supplies_id');
            $table->string('product_name');
            $table->integer('product_quantity');
            $table->decimal('product_price', 5, 2);
            $table->decimal('transaction_price', 10, 2);
            $table->string('sell_to')
                ->nullable(); // no content yet
            $table->string('buy_from')
                ->nullable(); // no content yet
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
        Schema::dropIfExists('transactions');
    }
};
