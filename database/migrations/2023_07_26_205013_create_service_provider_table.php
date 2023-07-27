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
        Schema::create('service_provider', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->string('email');
            $table->string('phone_no', 20)->nullable();
            $table->string('password');
            $table->string('image')->default('default.png');
            $table->integer('price_per_hour')->nullable()->default(0);
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->text('categories')->nullable();
            $table->string('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('lang')->nullable();
            $table->text('description')->nullable();
            $table->integer('available')->default(1);
            $table->integer('auto_approve')->default(0);
            $table->integer('noti')->default(1);
            $table->integer('status')->default(1);
            $table->integer('verified')->default(0);
            $table->string('OTP', 10)->nullable();
            $table->string('device_token')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_provider');
    }
};
