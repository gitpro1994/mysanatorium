<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MedicalBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicalBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['medical_base'] = MedicalBase::all();
        return view('admin.sanatorium-properties.medical-base.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sanatorium-properties.medical-base.create');
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('backend/images/medical-base'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('backend/images/medical-base'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
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
            'name' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $medical_base = new MedicalBase();
            $medical_base->name = $request->name;
            $medical_base->description = $request->description;
            if($request->file('image')){
                $file= $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/images/medical-base'), $filename);
                $medical_base->image = $filename;
            }
            $medical_base->save();

            return redirect()->route('admin.medical-base')->with('success', 'Məlumatlar daxil edildi!');
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
        $data['medical_base'] = MedicalBase::find($id);
        return view('admin.sanatorium-properties.medical-base.edit', $data);
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
            'name' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $medical_base = MedicalBase::find($id);
            $medical_base->name = $request->name;
            $medical_base->description = $request->description;
            if($request->file('image')){
                $file= $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/images/medical-base'), $filename);
                $medical_base->image = $filename;
            }
            $medical_base->save();

            return redirect()->route('admin.medical-base')->with('success', 'Məlumatlar dəyişdirildi!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medical_base = MedicalBase::find($id);
        $medical_base->delete();
        return redirect()->route('admin.medical-base')->with('success','Məlumatlar silindi!');
    }

    public function check_status($id)
    {
        $medical_base = MedicalBase::find($id);
        if($medical_base['status'] == 1)
        {
            $medical_base->status = 0;
        }
        else
        {
            $medical_base->status = 1;
        }
        $medical_base->save();

        return "Status dəyişdirildi!";
    }

    public function deleted_medical_base()
    {
        $data['medical_base'] = MedicalBase::onlyTrashed()->get();
        return view('admin.sanatorium-properties.medical-base.deleted',$data);
    }

    public function restore($id)
    {
        MedicalBase::onlyTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Məlumat geri qaytarıldı!');
    }
}
