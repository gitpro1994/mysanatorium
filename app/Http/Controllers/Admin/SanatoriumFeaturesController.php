<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumFeatures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SanatoriumFeaturesController extends Controller
{
    public function index()
    {
        $data['features'] = SanatoriumFeatures::all();
        return view('admin.sanatorium-properties.sanatorium-features.index', $data);
    }

    public function deleted_features()
    {
        $data['feaures'] = SanatoriumFeatures::onlyTrashed()->get();
        return view('admin.sanatorium-properties.sanatorium-features.deleted', $data);
    }

    public function create()
    {
        return view('admin.sanatorium-properties.sanatorium-features.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name'              => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $features               = new SanatoriumFeatures();
            $features->name         = $request->name;
            if($request->file('image')){
                $file= $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/images/sanatorium-features'), $filename);
                $features->image = $filename;
            }
            $features->status = 1;
            $features->save();
            return redirect()->route('admin.sanatorium-features')->with('success','Məlumatlar daxil edildi!');
        }
    }

    public function edit($id)
    {
        $data['features'] = SanatoriumFeatures::find($id);
        return view('admin.sanatorium-properties.sanatorium-features.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name'              => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $features               = SanatoriumFeatures::find($id);
            $features->name         = $request->name;
            if($request->file('image')){
                $file= $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/images/sanatorium-features'), $filename);
                $features->image = $filename;
            }
            $features->status = 1;
            $features->save();
            return redirect()->route('admin.sanatorium-features')->with('success','Məlumatlar daxil edildi!');
        }
    }
    public function restore($id)
    {
        SanatoriumFeatures::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Məlumat geri qaytarıldı!');
    }

    public function destroy($id)
    {
        $features = SanatoriumFeatures::find($id);
        $features->delete();
        return redirect()->route('admin.sanatorium-features')->with('success','Məlumatlar silindi!');
    }

    public function check_status($id)
    {
        $features = SanatoriumFeatures::find($id);
        if($features['status'] == 1)
        {
            $features->status = 0;
        }
        else
        {
            $features->status = 1;
        }
        $features->save();

        return "Status dəyişdirildi!";
    }
}
