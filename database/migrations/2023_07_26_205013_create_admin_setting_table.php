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
        Schema::create('admin_setting', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name')->nullable();
            $table->text('logo')->nullable();
            $table->text('favicon')->nullable();
            $table->string('phone_no', 20)->nullable();
            $table->string('email')->default('support@email.com');
            $table->text('address')->nullable();
            $table->text('pp');
            $table->float('admin_per', 10, 0)->default(33);
            $table->integer('moderation')->default(0);
            $table->integer('notification')->default(1);
            $table->string('currency_symbol')->default('$');
            $table->string('currency')->default('USD');
            $table->integer('verification')->default(0);
            $table->string('sms_gateway', 20)->default('twilio');
            $table->string('country_code', 4)->default('+91');
            $table->integer('offline_payment')->default(1);
            $table->integer('stipe_status')->default(0);
            $table->integer('paypal_status')->default(0);
            $table->integer('razor_status')->default(0);
            $table->string('ios_version')->default('1.0.2');
            $table->string('android_version')->default('1.0.5');
            $table->text('color')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->string('license_code')->nullable();
            $table->string('license_name')->nullable();
            $table->string('license_status')->nullable();
            $table->integer('radius')->nullable();
            $table->string('mail_mailer', 50)->nullable();
            $table->string('mail_host', 100)->nullable();
            $table->string('mail_username', 150)->nullable();
            $table->string('mail_password', 150)->nullable();
            $table->string('mail_encryption', 100)->nullable();
            $table->string('mail_port', 50)->nullable();
            $table->string('mail_from_address', 150)->nullable();
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
        Schema::dropIfExists('admin_setting');
    }
};
