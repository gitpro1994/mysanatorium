<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TreatmentPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TreatmentPackageController extends Controller
{
    public function index()
    {
        $data['tp'] = TreatmentPackage::all();
        return view('admin.sanatorium-properties.treatment-package.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sanatorium-properties.treatment-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else {

            $tp = new TreatmentPackage();
            $tp->name = $request->name;
            $tp->status = 1;

            if($request->file('image')){
                $file= $request->file('image');
                $filename = $file->getClientOriginalName();
                $file-> move(public_path('backend/images/tp'), $filename);
                $tp->image = $filename;
            }
            $tp->save();
            return redirect()->route('admin.treatment-package')->with('success', 'Məlumatlar daxil edildi!');

        }
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
        $data['tp'] = TreatmentPackage::find($id);
        return view('admin.sanatorium-properties.treatment-package.edit', $data);
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
        $validator = Validator::make($request->all(), [
            'name'          => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else {

            $tp = TreatmentPackage::find($id);
            $tp->name = $request->name;

            if($request->file('image')){
                $file= $request->file('image');
                $filename = $file->getClientOriginalName();
                $file-> move(public_path('backend/images/tp'), $filename);
                $tp->image = $filename;
            }
            $tp->save();
            return redirect()->route('admin.treatment-package')->with('success', 'Məlumatlar dəyişdirildi!');

        }
    }

    public function deleted_tp()
    {
        $data['tp'] = TreatmentPackage::onlyTrashed()->get();
        return view('admin.sanatorium-properties.treatment-package.deleted',$data);
    }

    public function restore($id)
    {
        TreatmentPackage::onlyTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Məlumat geri qaytarıldı!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TreatmentPackage::find($id)->delete();
        return redirect()->back()->with('success', 'Məlumatlar silindi!');
    }

    public function check_status($id)
    {
        $treatment_directions = TreatmentPackage::find($id);
        if($treatment_directions['status'] == 1)
        {
            $treatment_directions->status = 0;
        }
        else
        {
            $treatment_directions->status = 1;
        }
        $treatment_directions->save();

        return "Status dəyişdirildi!";
    }
}
