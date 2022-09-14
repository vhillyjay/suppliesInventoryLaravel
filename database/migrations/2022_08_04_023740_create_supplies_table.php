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
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // creates created_at and updated_at
            $table->string('name')
                ->unique();
            $table->string('type');
            $table->string('brand')
                ->nullable();
            // $table->integer('price');
            $table->decimal('price', 5, 2);
            $table->integer('quantity');
            $table->string('image')
                ->nullable();
            // $table->double('price', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplies');
    }
};
