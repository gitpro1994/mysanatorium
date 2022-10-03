<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TreatmentDirections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TreatmentDirectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['td'] = TreatmentDirections::all();
        $data['deleted'] = TreatmentDirections::onlyTrashed()->count();

        return view('admin.sanatorium-properties.treatment-directions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sanatorium-properties.treatment-directions.create');
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
            'slug'          => 'required',
            'name'          => 'required',
            'description'   => 'required',
            'meta_title'    => 'required',
            'meta_desc'     => 'required',
            'keywords'      => 'required',
            'meta_H1'       => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {

            $td = new TreatmentDirections();
            $td->slug = $request->slug;
            $td->name = $request->name;
            $td->description = $request->description;
            $td->meta_title = $request->meta_title;
            $td->meta_desc = $request->meta_desc;
            $td->keywords = $request->keywords;
            $td->meta_H1 = $request->meta_H1;
            $td->meta_H1 = $request->meta_H1;
            $td->status = 1;

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('backend/images/td'), $filename);
                $td->image = $filename;
            }
            if ($request->file('cover')) {
                $file = $request->file('cover');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('backend/images/td'), $filename);
                $td->cover = $filename;
            }
            $td->save();
            return redirect()->route('admin.treatment-directions')->with('success', 'Məlumatlar daxil edildi!');
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
        $data['td'] = TreatmentDirections::find($id);
        return view('admin.sanatorium-properties.treatment-directions.edit', $data);
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
            'slug'          => 'required',
            'name'          => 'required',
            'description'   => 'required',
            'meta_title'    => 'required',
            'meta_desc'     => 'required',
            'keywords'      => 'required',
            'meta_H1'       => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {

            $td = TreatmentDirections::find($id);
            $td->slug = $request->slug;
            $td->name = $request->name;
            $td->description = $request->description;
            $td->meta_title = $request->meta_title;
            $td->meta_desc = $request->meta_desc;
            $td->keywords = $request->keywords;
            $td->meta_H1 = $request->meta_H1;
            $td->meta_H1 = $request->meta_H1;
            $td->status = 1;

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('backend/images/td'), $filename);
                $td->image = $filename;
            }
            $td->save();
            return redirect()->route('admin.treatment-directions')->with('success', 'Məlumatlar dəyişdirildi!');
        }
    }

    public function deleted_td()
    {
        $data['td'] = TreatmentDirections::onlyTrashed()->get();
        return view('admin.sanatorium-properties.treatment-directions.deleted', $data);
    }

    public function restore($id)
    {
        TreatmentDirections::onlyTrashed()->find($id)->restore();
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
        TreatmentDirections::find($id)->delete();
        return redirect()->back()->with('success', 'Məlumatlar silindi!');
    }

    public function check_status($id)
    {
        $treatment_directions = TreatmentDirections::find($id);
        if ($treatment_directions['status'] == 1) {
            $treatment_directions->status = 0;
        } else {
            $treatment_directions->status = 1;
        }
        $treatment_directions->save();

        return "Status dəyişdirildi!";
    }
}
