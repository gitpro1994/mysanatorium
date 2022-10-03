<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\RoutesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RoutesModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($country_id)
    {
        $data['routes'] = RoutesModel::where('country_id', $country_id)->get();
        $data['deleted'] = RoutesModel::onlyTrashed()->count();

        return view('admin.transfer-companies.routes.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['countries'] = Countries::where('status', 1)->get();
        return view('admin.transfer-companies.routes.create', $data);
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
            'country_id'        => 'required|integer',
            'address'           =>'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $route               = new RoutesModel;
            $route->country_id   = $request->country_id;
            $route->address      = $request->address;
            $route->status = 1;
            $route->save();
            return redirect()->route('admin.routes')->with('success','Məlumatlar daxil edildi!');
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
        $data['countries'] = Countries::where('status', 1)->get();
        $data['route'] = RoutesModel::find($id);

        return view('admin.transfer-companies.routes.edit',$data);
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
            'country_id'        => 'required|integer',
            'address'           =>'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $route               = RoutesModel::find($id);
            $route->country_id   = $request->country_id;
            $route->address      = $request->address;
            $route->status = 1;
            $route->save();
            return redirect()->route('admin.routes')->with('success','Məlumatlar daxil edildi!');
        }
    }

    public function deleted_routes()
    {
        $data['routes'] = RoutesModel::onlyTrashed()->get();
        return view('admin.transfer-companies.routes.deleted',$data);
    }

    public function restore($id)
    {
        RoutesModel::onlyTrashed()->find($id)->restore();
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
        RoutesModel::find($id)->delete();
        return redirect()->route('admin.routes')->with('success','Məlumatlar silindi  !');
    }

    public function check_status($id)
    {
        $routes = RoutesModel::find($id);
        if($routes['status'] == 1)
        {
            $routes->status = 0;
        }
        else
        {
            $routes->status = 1;
        }
        $routes->save();

        return "Status dəyişdirildi!";
    }
}
