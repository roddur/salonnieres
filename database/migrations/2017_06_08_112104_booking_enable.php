<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookingEnable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_enable', function (Blueprint $table) {
            $table->date('date');
            $table->integer('service_id');
            $table->boolean('shift');
            $table->boolean('enable');
            $table->primary(['date', 'service_id', 'shift']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_enable');
    }
}
