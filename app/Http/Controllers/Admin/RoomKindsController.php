<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomKinds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomKindsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['room_kinds'] = RoomKinds::all();
        return view('admin.sanatorium-properties.room-kinds.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sanatorium-properties.room-kinds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $room_kind = new RoomKinds();
            $room_kind->name = $request->name;
            $room_kind->description = $request->description;
            $room_kind->status = 1;
            $room_kind->save();
            return redirect()->route('admin.room-kinds')->with('success', 'Məlumatlar daxil edildi!');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['room_kind'] = RoomKinds::find($id);
        return view('admin.sanatorium-properties.room-kinds.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $room_kind = RoomKinds::find($id);
            $room_kind->name = $request->name;
            $room_kind->description = $request->description;
            $room_kind->save();
            return redirect()->route('admin.room-kinds')->with('success', 'Məlumatlar dəyişdirildi!');

        }
    }

    public function deleted_room_elements()
    {
        $data['room_kinds'] = RoomKinds::onlyTrashed()->get();
        return view('admin.sanatorium-properties.room-kinds.deleted', $data);
    }

    public function restore($id)
    {
        RoomKinds::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Məlumat geri qaytarıldı!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RoomKinds::find($id)->delete();
        return redirect()->back()->with('success', 'Məlumatlar silindi!');
    }

    public function check_status($id)
    {
        $room_kinds = RoomKinds::find($id);
        if ($room_kinds['status'] == 1) {
            $room_kinds->status = 0;
        } else {
            $room_kinds->status = 1;
        }
        $room_kinds->save();

        return "Status dəyişdirildi!";
    }
}
