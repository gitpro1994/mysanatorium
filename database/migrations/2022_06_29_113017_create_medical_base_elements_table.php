<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalBaseElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_base_elements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_bases_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->integer('status');
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
        Schema::dropIfExists('medical_base_elements');
    }
}
