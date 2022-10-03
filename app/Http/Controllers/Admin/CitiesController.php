<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\Countries;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CitiesController extends Controller
{
    public function index()
    {
        $data['cities'] = Cities::all();
        $data['deleted'] = Cities::onlyTrashed()->count();
        return view('admin.cities.index', $data);
    }

    public function deleted_cities()
    {
        $data['cities'] = Cities::onlyTrashed()->get();
        return view('admin.cities.deleted', $data);
    }

    public function create()
    {
        $data['countries'] = Countries::where('status', 1)->get();
        return view('admin.cities.create', $data);
    }

    public function store(Request $request)
    {


        $city               = new Cities;
        $city->country_id   = $request->country_id;
        $city->slug         = Str::slug($request->slug);
        $city->title        = $request->title;
        $city->search_title = $request->search_title;
        $city->status = 1;
        $city->save();
        toast('Şəhər məlumatları daxil edildi!', 'success');
        return redirect()->route('admin.cities');
    }

    public function edit($id)
    {
        $data['countries'] = Countries::where('status', 1)->get();
        $data['city'] = Cities::find($id);
        return view('admin.cities.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $city               = Cities::find($id);
        $city->country_id   = $request->country_id;
        $city->slug         = Str::slug($request->slug);
        $city->title        = $request->title;
        $city->search_title = $request->search_title;
        $city->status = 1;
        $city->save();
        toast('Şəhər məlumatları dəyişdirildi!', 'success');
        return redirect()->route('admin.cities');
    }
    public function restore($id)
    {
        Cities::withTrashed()->find($id)->restore();
        toast('Şəhər məlumatları geri qaytarıldı!', 'info');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $city = Cities::find($id);
        $city->delete();
        toast('Şəhər məlumatları silindi!', 'warning');
        return redirect()->route('admin.cities');
    }

    public function check_status($id)
    {
        $city = Cities::find($id);
        if ($city['status'] == 1) {
            $city->status = 0;
        } else {
            $city->status = 1;
        }
        $city->save();

        return "Status dəyişdirildi!";
    }
}
