<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\RouteLines;
use App\Models\RoutesModel;
use App\Models\TransferCompanies;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;

class RouteLinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($company_id)
    {
        $data['route_lines'] = RouteLines::where('transfer_company_id', $company_id)->get();
        return view('admin.transfer-companies.route-lines.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['transfer_companies'] = TransferCompanies::where('status', 1)->get();
        $data['routes']             = RoutesModel::where('status', 1)->get();
        return view('admin.transfer-companies.route-lines.create', $data);
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
            'transfer_company_id'      => 'required|integer',
            'price'                    => 'required',
            'name_surname'             => 'required',
            'note'                     => 'required',
            'from'                     => 'required|integer',
            'to'                       => 'required|integer',
            'travel_time'              => 'required',
            'travel_type'              => 'required',
            'min'                      => 'required',
            'max'                      => 'required',
            'description'              => 'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {

            $route_lines                        = new RouteLines;
            $route_lines->transfer_company_id   = $request->transfer_company_id;
            $route_lines->price                 = $request->price;
            $route_lines->name_surname          = $request->name_surname;
            $route_lines->note                  = $request->note;
            $route_lines->from                  = $request->from;
            $route_lines->to                    = $request->to;
            $route_lines->travel_time           = $request->travel_time;
            $route_lines->travel_type           = $request->travel_type;
            $route_lines->min                   = $request->min;
            $route_lines->max                   = $request->max;
            $route_lines->description           = $request->description;
            $route_lines->status                = 1;
            $route_lines->save();
            return redirect()->route('admin.route-lines')->with('success','Məlumatlar daxil edildi!');
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
        $data['route_line'] = RouteLines::find($id);
        $data['transfer_companies'] = TransferCompanies::where('status', 1)->get();
        $data['routes']             = RoutesModel::where('status', 1)->get();
        return view('admin.transfer-companies.route-lines.edit', $data);
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
            'transfer_company_id'      => 'required|integer',
            'price'                    => 'required',
            'name_surname'             => 'required',
            'note'                     => 'required',
            'from'                     => 'required|integer',
            'to'                       => 'required|integer',
            'travel_time'              => 'required',
            'travel_type'              => 'required',
            'min'                      => 'required',
            'max'                      => 'required',
            'description'              => 'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {

            $route_lines                        = RouteLines::find($id);
            $route_lines->transfer_company_id   = $request->transfer_company_id;
            $route_lines->price                 = $request->price;
            $route_lines->name_surname          = $request->name_surname;
            $route_lines->note                  = $request->note;
            $route_lines->from                  = $request->from;
            $route_lines->to                    = $request->to;
            $route_lines->travel_time           = $request->travel_time;
            $route_lines->travel_type           = $request->travel_type;
            $route_lines->min                   = $request->min;
            $route_lines->max                   = $request->max;
            $route_lines->description           = $request->description;
            $route_lines->status                = 1;
            $route_lines->save();
            return redirect()->route('admin.route-lines')->with('success','Məlumatlar dəyişdirildi!');
        }
    }

    public function deleted_route_lines()
    {
        $data['routes'] = RouteLines::onlyTrashed()->get();
        return view('admin.transfer-companies.route-lines.deleted', $data);
    }

    public function restore($id)
    {
        RouteLines::onlyTrashed()->find($id)->restore();
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
        RouteLines::find($id)->delete();
        return redirect()->route('admin.route-lines')->with('success','Məlumatlar silindi!');
    }

    public function check_status($id)
    {
        $route_lines = RouteLines::find($id);
        if($route_lines['status'] == 1)
        {
            $route_lines->status = 0;
        }
        else
        {
            $route_lines->status = 1;
        }
        $route_lines->save();

        return "Status dəyişdirildi!";
    }
}
