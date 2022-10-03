<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenaltiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penalties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sanatoriums_id')->constrained()->onDelete('cascade');
            $table->string('before_0_2_days')->nullable();
            $table->string('before_3_7_days')->nullable();
            $table->string('before_8_14_days')->nullable();
            $table->string('before_15_21_days')->nullable();
            $table->string('before_22_28_days')->nullable();
            $table->string('before_29_days')->nullable();
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
        Schema::dropIfExists('penalties');
    }
}
