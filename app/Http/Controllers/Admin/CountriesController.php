<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['countries'] = Countries::all();
        $data['deleted'] = Countries::onlyTrashed()->count();
        return view('admin.countries.index', $data);
    }

    public function deleted_countries()
    {
        $data['countries'] = Countries::onlyTrashed()->get();
        return view('admin.countries.deleted', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $countries = new Countries();
        $countries->slug = Str::slug($request->slug);
        $countries->title = $request->title;
        $countries->search_title = $request->search_title;
        $countries->shortened = $request->shortened;
        $countries->meta_titul = $request->meta_titul;
        $countries->meta_description = $request->meta_description;
        $countries->meta_keywords = $request->meta_keywords;
        $countries->meta_H1 = $request->meta_H1;
        $countries->country_number_prefix = $request->country_number_prefix;
        if ($request->for_sanatorium == "on") {
            $countries->for_sanatorium = 1;
        } else {
            $countries->for_sanatorium = 0;
        }

        if ($request->hasFile('flag')) {
            $file = $request->file('flag');
            $extension = $file->getClientOriginalExtension();
            $destination = 'backend/images/flags/';
            $filename = uniqid() . '.' . $extension;
            $file->move($destination, $filename);
            $countries->flag = $filename;
        };
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $destination = 'backend/images/cover/';
            $filename = uniqid() . '.' . $extension;
            $file->move($destination, $filename);
            $countries->cover = $filename;
        };
        $countries->status = 1;
        $countries->save();

        Schema::connection('mysql')->create('group_' . $countries->id, function ($table) {
            $table->foreignId('sanatoriums_id')->constrained('sanatoriums');
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
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::connection('mysql')->create('daily_price_group_' . $countries->id, function ($table) {
            $table->increments('id');
            $table->integer('sanatoriums_id');
            $table->foreignId('room_kinds_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('input_name')->nullable();
            $table->string('date_of_price')->nullable();
            $table->float('price')->nullable();
            $table->timestamps();
        });

        Schema::connection('mysql')->create('weekly_price_group_' . $countries->id, function ($table) {
            $table->increments('id');
            $table->integer('sanatoriums_id');
            $table->foreignId('room_kinds_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('package')->nullable();
            $table->string('input_name')->nullable();
            $table->string('date_of_price')->nullable();
            $table->float('price')->nullable();
            $table->timestamps();
        });

        Schema::connection('mysql')->create('optional_price_group_' . $countries->id, function ($table) {
            $table->increments('id');
            $table->integer('sanatoriums_id');
            $table->foreignId('room_kinds_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('package')->nullable();
            $table->string('input_name')->nullable();
            $table->string('date_of_price')->nullable();
            $table->float('price')->nullable();
            $table->timestamps();
        });

        toast('Ölkə məlumatları daxil edildi!', 'success');
        return redirect()->route('admin.countries');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['country'] = Countries::find($id);
        return view('admin.countries.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $countries = Countries::find($id);
        $countries->slug = Str::slug($request->slug);
        $countries->title = $request->title;
        $countries->search_title = $request->search_title;
        $countries->shortened = $request->shortened;
        $countries->meta_titul = $request->meta_titul;
        $countries->meta_description = $request->meta_description;
        $countries->meta_keywords = $request->meta_keywords;
        $countries->meta_H1 = $request->meta_H1;
        $countries->country_number_prefix = $request->country_number_prefix;
        if ($request->for_sanatorium == "on") {
            $countries->for_sanatorium = 1;
        } else {
            $countries->for_sanatorium = 0;
        }

        if ($request->hasFile('flag')) {
            $file = $request->file('flag');
            $extension = $file->getClientOriginalExtension();
            $destination = 'backend/images/flags/';
            $filename = uniqid() . '.' . $extension;
            $file->move($destination, $filename);
            $countries->flag = $filename;
        };
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $destination = 'backend/images/cover/';
            $filename = uniqid() . '.' . $extension;
            $file->move($destination, $filename);
            $countries->cover = $filename;
        };
        $countries->status = 1;
        $countries->save();
        toast('Ölkə məlumatları dəyişdirildi!', 'success');
        return redirect()->route('admin.countries');
    }

    public function restore($id)
    {
        Countries::withTrashed()->find($id)->restore();
        toast('Ölkə məlumatları geri qaytarıldı!', 'info');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $country = Countries::find($id);
        $country->delete();
        toast('Ölkə məlumatları silindi!', 'warning');
        return redirect()->route('admin.countries');
    }

    public function check_status($id)
    {
        $country = Countries::find($id);
        if ($country['status'] == 1) {
            $country->status = 0;
            $text = "deaktiv";
        } else {
            $country->status = 1;
            $text = "aktiv";
        }
        $country->save();

        return "Status " . $text . " olaraq dəyişdirildi!";
    }
}
