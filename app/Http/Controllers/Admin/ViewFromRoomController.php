<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ViewFromRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ViewFromRoomController extends Controller
{
    public function index()
    {
        $data['types'] = ViewFromRoom::all();
        return view('admin.sanatorium-properties.view-from-room.index', $data);
    }

    public function create()
    {
        return view('admin.sanatorium-properties.view-from-room.create');
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

            $view_from_room = new ViewFromRoom();
            $view_from_room->name = $request->name;
            $view_from_room->status = 1;
            $view_from_room->save();
            return redirect()->route('admin.view-from-rooms')->with('success','Məlumatlar daxil edildi!');
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
        $data['types'] = ViewFromRoom::find($id);
        return view('admin.sanatorium-properties.view-from-room.edit', $data);
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

            $view_from_room = ViewFromRoom::find($id);
            $view_from_room->name = $request->name;
            $view_from_room->save();
            return redirect()->route('admin.view-from-rooms')->with('success','Məlumatlar daxil edildi!');
        }
    }

    public function deleted_tr()
    {
        $data['types'] = ViewFromRoom::onlyTrashed()->get();
        return view('admin.sanatorium-properties.view-from-room.deleted', $data);
    }

    public function restore($id)
    {
        ViewFromRoom::withTrashed()->find($id)->restore();
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
        ViewFromRoom::find($id)->delete();
        return redirect()->route('admin.view-from-rooms')->with('success','Məlumatlar silindi!');
    }

    public function check_status($id)
    {
        $view_from_room = ViewFromRoom::find($id);
        if($view_from_room['status'] == 1)
        {
            $view_from_room->status = 0;
        }
        else
        {
            $view_from_room->status = 1;
        }
        $view_from_room->save();

        return "Status dəyişdirildi!";
    }
}
