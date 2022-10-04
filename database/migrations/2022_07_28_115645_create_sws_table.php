<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sws', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sanatoriums_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_kinds_id')->constrained('room_kinds')->onDelete('cascade');
            $table->integer('price_table_kind')->default(1);
            $table->integer('food_count')->default(1);
            $table->integer('room_count')->nullable();
            $table->integer('general_human_count')->nullable();
            $table->integer('minimum_human_count')->nullable();
            $table->integer('older_count')->nullable();
            $table->integer('child_count')->nullable();
            $table->integer('possible_additional_beds')->nullable();
            $table->integer('for')->nullable();
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
        Schema::dropIfExists('sws');
    }
}
