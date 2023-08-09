<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('binance_email')->unique();
            $table->string('binance_id')->unique()->nullable();
            $table->string('referral_email')->nullable();
            $table->string('referral_id')->nullable();
            $table->string('mobile')->nullable();
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->integer('total_amount')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->enum('plan', ['international', 'standard', 'goal'])->default('international');
            $table->enum('status', ['approved', 'deleted', 'pending'])->default('pending');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
