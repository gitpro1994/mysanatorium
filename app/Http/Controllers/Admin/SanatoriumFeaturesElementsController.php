<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumFeatures;
use App\Models\SanatoriumFeaturesElements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SanatoriumFeaturesElementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($sanatorium_features_id)
    {
        $data['features'] = SanatoriumFeatures::where('id', $sanatorium_features_id)->first();
        $data['elements'] = SanatoriumFeaturesElements::where('sanatorium_features_id', $sanatorium_features_id)->get();
        return view('admin.sanatorium-properties.sanatorium-features.sanatorium-elements.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sanatorium_features_id)
    {
        $data['features'] = SanatoriumFeatures::where('id', $sanatorium_features_id)->first();
        return view('admin.sanatorium-properties.sanatorium-features.sanatorium-elements.create', $data);
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
            'sanatorium_features_id'    => 'required|integer',
            'name'                      =>'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $element                            = new SanatoriumFeaturesElements;
            $element->sanatorium_features_id    = $request->sanatorium_features_id;
            $element->name                  = $request->name;
            if($request->file('image')){
                $file= $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/images/sanatorium-features/elements'), $filename);
                $element->image = $filename;
            }

            $element->status = 1;
            $element->save();
            return redirect()->route('admin.sanatorium-elements', ['sanatorium_features_id'=>$request->sanatorium_features_id])->with('success','Məlumat dəyişdirildi!');
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
        $data['element'] = SanatoriumFeaturesElements::find($id);
        return view('admin.sanatorium-properties.sanatorium-features.sanatorium-elements.edit', $data);
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
            'sanatorium_features_id'    => 'required|integer',
            'name'                      =>'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $element                            = SanatoriumFeaturesElements::find($id);
            $element->sanatorium_features_id    = $request->sanatorium_features_id;
            $element->name                      = $request->name;
            if($request->file('image')){
                $file= $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/images/sanatorium-features/elements'), $filename);
                $element->image = $filename;
            }

            $element->status = 1;
            $element->save();
            return redirect()->route('admin.sanatorium-elements', ['sanatorium_features_id'=>$request->sanatorium_features_id])->with('success','Məlumat dəyişdirildi!');
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
        //
    }
}
