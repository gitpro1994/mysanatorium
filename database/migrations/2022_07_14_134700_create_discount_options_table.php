<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sanatoriums_id')->constrained()->onDelete('cascade');
            $table->foreignId('discounts_id')->constrained()->onDelete('cascade');
            $table->integer('room_kinds_id')->nullable();
            $table->integer('all_rooms')->nullable();
            $table->date('start_date');
            $table->date('finish_date');
            $table->float('discount')->nullable();
            $table->integer('min_night')->nullable();
            $table->integer('max_night')->nullable();
            $table->integer('depending_number_of_person')->nullable();
            $table->integer('number_of_person')->nullable();
            $table->integer('free_night')->nullable();
            $table->integer('before_reserv_day_start')->nullable();
            $table->integer('before_reserv_day_end')->nullable();

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
        Schema::dropIfExists('discount_options');
    }
}
