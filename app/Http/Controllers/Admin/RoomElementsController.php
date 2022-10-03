<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomConditions;
use App\Models\RoomElements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomElementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($room_condition_id)
    {
        $data['room_condition'] = RoomConditions::where('id', $room_condition_id)->first();
        $data['elements'] = RoomElements::where('room_condition_id', $room_condition_id)->get();
        return view('admin.sanatorium-properties.room-conditions.elements.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['room_condition'] = RoomConditions::where('id', $id)->first();
        return view('admin.sanatorium-properties.room-conditions.elements.create', $data);
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
            'room_condition_id'         => 'required|integer',
            'name'                      =>'required',
            'description'               =>'required',
            'show_filter'               =>'required|integer'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $element                        = new RoomElements;
            $element->room_condition_id     = $request->room_condition_id;
            $element->name                  = $request->name;
            $element->description           = $request->description;
            $element->show_filter           = $request->show_filter;
            $element->status = 1;
            $element->save();
            return redirect()->route('admin.elements', ['room_condition_id'=>$request->room_condition_id])->with('success','Məlumat əlavə olundu!');
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
        $data['element'] = RoomElements::find($id);
        return view('admin.sanatorium-properties.room-conditions.elements.edit', $data);
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
            'room_condition_id'         => 'required|integer',
            'name'                      =>'required',
            'description'               =>'required',
            'show_filter'               =>'required|integer'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $element                        = RoomElements::find($id);
            $element->room_condition_id     = $request->room_condition_id;
            $element->name                  = $request->name;
            $element->description           = $request->description;
            $element->show_filter           = $request->show_filter;
            $element->save();
            return redirect()->route('admin.elements', ['room_condition_id'=>$request->room_condition_id])->with('success','Məlumatlar yeniləndi!');
        }
    }

    public function deleted_room_elements()
    {
        $data['elements'] = RoomElements::onlyTrashed()->get();
        return view('admin.sanatorium-properties.room-conditions.elements.deleted',$data);
    }

    public function restore($id)
    {
        RoomElements::withTrashed()->find($id)->restore();
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
        RoomElements::find($id)->delete();
        return redirect()->back()->with('success', 'Məlumatlar silindi!');
    }

    public function check_status($id)
    {
        $elements = RoomElements::find($id);
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
