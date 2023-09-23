<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('referring_id')->nullable();
            $table->foreign('referring_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('deposit')->nullable()->default(0);
            $table->integer('withdraw')->nullable()->default(0);
            $table->enum('status', ['approved', 'deleted', 'pending'])->default('pending');
            $table->enum('request_type', ['withdraw', 'deposit','interest', 'principle']);
            $table->string('proof')->nullable();
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
}
