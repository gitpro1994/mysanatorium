<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transfer_company_id')->constrained()->onDelete('cascade');
            $table->float('price');
            $table->string('name_surname');
            $table->string('note');
            $table->integer('from');
            $table->integer('to');
            $table->string('travel_time');
            $table->integer('travel_type');
            $table->integer('min');
            $table->integer('max');
            $table->text('description');
            $table->integer('status')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('route_lines');
    }
}
