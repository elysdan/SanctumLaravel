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
        Schema::create('payment_transaction', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('provider_id');
            $table->integer('booking_id')->index('booking_id');
            $table->float('admin_share', 10, 0);
            $table->float('provider_share', 10, 0);
            $table->integer('payment')->default(0)->comment('0=online 1 = offline ');
            $table->integer('shattle')->default(0)->comment('0=not 1=done = 2 =cancel ');
            $table->dateTime('shattle_at')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->index(['provider_id', 'booking_id'], 'provider_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_transaction');
    }
};
