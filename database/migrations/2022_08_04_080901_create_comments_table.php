<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sanatoriums_id')->constrained()->onDelete('cascade');
            $table->integer('country_id')->nullable();
            $table->integer('who_shared')->nullable();
            $table->integer('treatment_quality')->nullable();
            $table->integer('reservation_quality')->nullable();
            $table->integer('food_quality')->nullable();
            $table->integer('personal_quality')->nullable();
            $table->integer('location_quality')->nullable();
            $table->string('user_information')->nullable();
            $table->text('positive')->nullable();
            $table->text('negative')->nullable();
            $table->date('shared_at');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('comments');
    }
}
