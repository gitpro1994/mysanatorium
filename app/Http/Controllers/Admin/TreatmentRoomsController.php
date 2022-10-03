<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TreatmentRooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TreatmentRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['treatment_rooms'] = TreatmentRooms::all();
        return view('admin.sanatorium-properties.treatment-rooms.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sanatorium-properties.treatment-rooms.create');
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

            $room = new TreatmentRooms();
            $room->name = $request->name;
            $room->status = 1;
            $room->save();
            return redirect()->route('admin.treatment-rooms')->with('success','Məlumatlar daxil edildi!');
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
        $data['room'] = TreatmentRooms::find($id);
        return view('admin.sanatorium-properties.treatment-rooms.edit', $data);
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

            $room = TreatmentRooms::find($id);
            $room->name = $request->name;
            $room->save();
            return redirect()->route('admin.treatment-rooms')->with('success','Məlumatlar daxil edildi!');
        }
    }

    public function deleted_td()
    {
        $data['rooms'] = TreatmentRooms::onlyTrashed()->get();
        return view('admin.sanatorium-properties.treatment-rooms.deleted', $data);
    }

    public function restore($id)
    {
        TreatmentRooms::withTrashed()->find($id)->restore();
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
        TreatmentRooms::find($id)->delete();
        return redirect()->route('admin.treatment-rooms')->with('success','Məlumatlar silindi!');
    }

    public function check_status($id)
    {
        $room = TreatmentRooms::find($id);
        if($room['status'] == 1)
        {
            $room->status = 0;
        }
        else
        {
            $room->status = 1;
        }
        $room->save();

        return "Status dəyişdirildi!";
    }
}
