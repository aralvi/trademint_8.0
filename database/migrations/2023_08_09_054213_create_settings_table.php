<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->integer('min_deposit')->default(0)->nullable();
            $table->integer('max_deposit')->default(0)->nullable();
            $table->integer('min_withdraw')->default(0)->nullable();
            $table->integer('max_withdraw')->default(0)->nullable();
            $table->enum('enable_investment', ['0', '1'])->default(1);
            $table->enum('enable_registration', ['0', '1'])->default(1);
            $table->enum('compound', ['0', '1'])->default(0);
            $table->string('international_plan_interest')->nullable()->default(0);
            $table->string('standard_plan_interest')->nullable()->default(0);
            $table->string('goal_plan_interest')->nullable()->default(0);
            $table->string('referral_interest')->nullable()->default(0);
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
        Schema::dropIfExists('settings');
    }
}
