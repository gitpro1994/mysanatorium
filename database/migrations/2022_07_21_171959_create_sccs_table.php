<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSccsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sccs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sanatoriums_id')->constrained()->onDelete('cascade');
            $table->jsonb('credit_cards_id');
            $table->date('start_date');
            $table->date('finish_date');
            $table->integer('cvv_available')->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('sccs');
    }
}
