<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MedicalBaseElements;
use App\Models\MedicalBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicalBaseElementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($medical_bases_id)
    {
        $data['medical_base'] = MedicalBase::where('id', $medical_bases_id)->first();
        $data['elements'] = MedicalBaseElements::where('medical_bases_id', $medical_bases_id)->get();
        return view('admin.sanatorium-properties.medical-base.medical-elements.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['medical_base'] = MedicalBase::where('id', $id)->first();
        return view('admin.sanatorium-properties.medical-base.medical-elements.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'medical_bases_id'          => 'required|integer',
            'name'                      =>'required',
            'description'               =>'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $element                        = new MedicalBaseElements();
            $element->medical_bases_id       = $request->medical_bases_id;
            $element->name                  = $request->name;
            $element->description           = $request->description;

            if($request->file('image')){
                $file= $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/images/medical-base/elements'), $filename);
                $element->image = $filename;
            }

            $element->status = 1;
            $element->save();
            return redirect()->route('admin.medical-base-elements', ['medical_bases_id'=>$request->medical_bases_id])->with('success','Məlumat əlavə olundu!');
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
        $data['element'] = MedicalBaseElements::find($id);
        return view('admin.sanatorium-properties.medical-base.medical-elements.edit', $data);
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
        $validator = Validator::make($request->all(),[
            'medical_bases_id'          => 'required|integer',
            'name'                      =>'required',
            'description'               =>'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $element                        = MedicalBaseElements::find($id);
            $element->medical_bases_id       = $request->medical_bases_id;
            $element->name                  = $request->name;
            $element->description           = $request->description;

            if($request->file('image')){
                $file= $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/images/medical-base/elements'), $filename);
                $element->image = $filename;
            }

            $element->status = 1;
            $element->save();
            return redirect()->route('admin.medical-base-elements', ['medical_bases_id'=>$request->medical_bases_id])->with('success','Məlumat dəyişdirildi!');
        }
    }

    public function deleted_medical_elements()
    {
        $data['elements'] = MedicalBaseElements::onlyTrashed()->get();
        return view('admin.sanatorium-properties.medical-base.medical-elements.deleted',$data);
    }

    public function restore($id)
    {
        MedicalBaseElements::withTrashed()->find($id)->restore();
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
        MedicalBaseElements::find($id)->delete();
        return redirect()->back()->with('success', 'Məlumatlar silindi!');
    }

    public function check_status($id)
    {
        $elements = MedicalBaseElements::find($id);
        if($elements['status'] == 1)
        {
            $elements->status = 0;
        }
        else
        {
            $elements->status = 1;
        }
        $elements->save();

        return "Status dəyişdirildi!";
    }
}
