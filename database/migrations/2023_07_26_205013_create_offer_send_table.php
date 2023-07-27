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
        Schema::create('offer_send', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('provider_id');
            $table->integer('booking_id')->index('booking_id');
            $table->float('price', 10, 0);
            $table->integer('status')->default(0)->comment('0 = waiting 1= done 2= cancel ');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('offer_send');
    }
};
