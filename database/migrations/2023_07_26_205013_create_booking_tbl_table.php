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
        Schema::create('booking_tbl', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('booking_id', 50);
            $table->integer('user_id');
            $table->integer('provider_id')->nullable()->index('provider_id');
            $table->integer('cat_id')->index('cat_id');
            $table->integer('service_id')->index('service_id');
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('req_want')->nullable();
            $table->integer('price_type')->comment('0 = hour 1 = fixed');
            $table->integer('job_type')->default(0)->comment('0 = direct 1 = offer ');
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->string('payment_method')->default('ONLINE');
            $table->string('payment_token')->nullable();
            $table->integer('payment_status')->default(0)->comment('0 = remaing 1 = complate 2 = cancel');
            $table->float('base_price', 10, 0)->nullable();
            $table->float('discount', 10, 0)->default(0);
            $table->float('total_amount', 10, 0)->default(0);
            $table->float('admin_per', 10, 0)->default(0);
            $table->integer('status')->default(0)->comment(' // 0 = post 1=adminapprove 2 =providerapproved 3 = workdone  5= admin cancel 6=cancl');
            $table->string('start_time_image', 50)->nullable();
            $table->string('end_time_image', 50)->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->index(['user_id', 'provider_id', 'cat_id', 'service_id'], 'user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_tbl');
    }
};
