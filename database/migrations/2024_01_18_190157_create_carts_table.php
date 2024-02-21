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
            $table->id(); // This assumes you have an 'id' column as the primary key.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('ticket_type');
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps(); // This will add 'created_at' and 'updated_at' columns.
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
