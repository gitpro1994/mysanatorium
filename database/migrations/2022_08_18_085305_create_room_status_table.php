<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_status', function (Blueprint $table) {
            $table->id();
            $table->integer('sanatoriums_id');
            $table->foreignId('room_kinds_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('week_days')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('room_status');
    }
}
