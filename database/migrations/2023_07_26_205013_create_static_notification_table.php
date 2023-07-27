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
        Schema::create('static_notification', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('for_what');
            $table->text('title');
            $table->text('sub_title');
            $table->integer('status')->default(1);
            $table->integer('for_who')->default(0)->comment('0 = user 1 = provide 2= both');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('static_notification');
    }
};
