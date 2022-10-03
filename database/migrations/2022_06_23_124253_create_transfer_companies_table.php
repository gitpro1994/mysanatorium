<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('related_person');
            $table->string('address');
            $table->string('postal_code');
            $table->string('representative');
            $table->string('tax_number');
            $table->string('voen');
            $table->string('contact_number')->unique();
            $table->string('email')->unique();
            $table->string('reservation_email')->unique();
            $table->foreignId('currency_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('transfer_companies');
    }
}
