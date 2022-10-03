<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomConditions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomConditionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rc'] = RoomConditions::all();
        return view('admin.sanatorium-properties.room-conditions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sanatorium-properties.room-conditions.create');
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
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $room = new RoomConditions();
            $room->name         = $request->name;
            $room->description  = $request->description;
            $room->status       = 1;
            $room->save();

            return redirect()->route('admin.room-conditions')->with('success', 'Məlumatlar daxil edildi!');

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
        $data['room'] = RoomConditions::find($id);
        return view('admin.sanatorium-properties.room-conditions.edit', $data);
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
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $room = RoomConditions::find($id);
            $room->name         = $request->name;
            $room->description  = $request->description;
            $room->status       = 1;
            $room->save();

            return redirect()->route('admin.room-conditions')->with('success', 'Məlumatlar dəyişdirildi!');

        }
    }

    public function deleted_room_conditions()
    {
        $data['rc'] = RoomConditions::onlyTrashed()->get();
        return view('admin.sanatorium-properties.room-conditions.deleted',$data);
    }

    public function restore($id)
    {
        RoomConditions::withTrashed()->find($id)->restore();
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
        RoomConditions::find($id)->delete();
        return redirect()->route('admin.room-conditions')->with('success', 'Məlumatlar silindi!');
    }

    public function check_status($id)
    {
        $room_conditions = RoomConditions::find($id);
        if($room_conditions['status'] == 1)
        {
            $room_conditions->status = 0;
        }
        else
        {
            $room_conditions->status = 1;
        }
        $room_conditions->save();

        return "Status dəyişdirildi!";
    }
}
