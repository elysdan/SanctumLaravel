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
        Schema::create('app_users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('phone_no', 20)->nullable();
            $table->string('image')->default('default.png');
            $table->text('address')->nullable();
            $table->string('device_token')->nullable();
            $table->integer('status')->default(1);
            $table->text('liked_provider')->nullable();
            $table->string('OTP', 6)->nullable()->default('');
            $table->integer('noti')->default(1);
            $table->integer('verified')->default(0);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_users');
    }
};
