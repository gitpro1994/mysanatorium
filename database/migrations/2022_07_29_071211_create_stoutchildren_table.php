<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoutchildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stoutchildren', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sanatoriums_id')->constrained()->onDelete('cascade');
            $table->integer('out_child_is_accepted')->nullable();
            $table->integer('min_age')->default(1);
            $table->integer('max_age')->default(1);
            $table->integer('paid_or_not')->nullable();
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
        Schema::dropIfExists('stoutchildren');
    }
}
