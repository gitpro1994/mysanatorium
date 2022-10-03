<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWizartOptionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wizart_optionals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sanatoriums_id')->constrained('sanatoriums');
            $table->integer('min_day');
            $table->integer('max_day')->nullable();
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
        Schema::dropIfExists('wizart_optionals');
    }
}
