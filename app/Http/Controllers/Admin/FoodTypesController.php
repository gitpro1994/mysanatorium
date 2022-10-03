<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['types'] = FoodTypes::all();
        return view('admin.sanatorium-properties.food-types.index', $data);
    }

    public function create()
    {
        return view('admin.sanatorium-properties.food-types.create');
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
            'name'        => 'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else {

            $type = new FoodTypes();
            $type->name = $request->name;
            $type->status = 1;
            $type->save();
            return redirect()->route('admin.food-types')->with('success','Məlumatlar daxil edildi!');
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
        $data['types'] = FoodTypes::find($id);
        return view('admin.sanatorium-properties.food-types.edit', $data);
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
            'name'        => 'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else {

            $type = FoodTypes::find($id);
            $type->name = $request->name;
            $type->save();
            return redirect()->route('admin.food-types')->with('success','Məlumatlar daxil edildi!');
        }
    }

    public function deleted_tr()
    {
        $data['types'] = FoodTypes::onlyTrashed()->get();
        return view('admin.sanatorium-properties.food-types.deleted', $data);
    }

    public function restore($id)
    {
        FoodTypes::withTrashed()->find($id)->restore();
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
        FoodTypes::find($id)->delete();
        return redirect()->route('admin.food-types')->with('success','Məlumatlar silindi!');
    }

    public function check_status($id)
    {
        $type = FoodTypes::find($id);
        if($type['status'] == 1)
        {
            $type->status = 0;
        }
        else
        {
            $type->status = 1;
        }
        $type->save();

        return "Status dəyişdirildi!";
    }
}
