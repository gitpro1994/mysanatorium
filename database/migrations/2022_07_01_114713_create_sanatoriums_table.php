<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanatoriumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanatoriums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('search_title');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->string('meta_H1');
            $table->string('slug');
            $table->string('address');
            $table->foreignId('currency_id')->constrained();
            $table->string('main_image');
            $table->string('second_image');
            $table->string('youtube_video_link');
            $table->string('youtube_image');
            $table->integer('rate');
            $table->string('bron_email');
            $table->string('phone_number');
            $table->string('map');
            $table->string('_3d_map');
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('number_of_staff');
            $table->integer('tax_included');
            $table->float('tax_price');
            $table->integer('transfer_included');
            $table->string('transfer_link');
            $table->text('main_description')->nullable();
            $table->text('reservation_rules')->nullable();
            $table->text('payment_rules')->nullable();
            $table->text('reservation_contract')->nullable();
            $table->text('advantages')->nullable();
            $table->text('important_to_know')->nullable();
            $table->text('treatment_package_price')->nullable();
            $table->text('paid_medical_procedures')->nullable();
            $table->text('check_in_for_adults')->nullable();
            $table->text('check_in_for_children')->nullable();
            $table->integer('status');
            $table->string('daily_price_group')->nullable();
            $table->string('weekly_price_group')->nullable();
            $table->string('optional_price_group')->nullable();
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
        Schema::dropIfExists('sanatoriums');
    }
}
