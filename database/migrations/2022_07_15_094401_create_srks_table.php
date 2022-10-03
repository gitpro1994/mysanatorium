<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSrksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('srks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sanatoriums_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_kinds_id')->constrained()->onDelete('cascade');
            $table->string('room_size')->nullable();
            $table->string('bed_width')->nullable();
            $table->integer('smoking')->nullable();
            $table->string('main_image')->nullable();
            $table->text('room_features')->nullable();
            $table->jsonb('room_amenities')->nullable();
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
        Schema::dropIfExists('srks');
    }
}
