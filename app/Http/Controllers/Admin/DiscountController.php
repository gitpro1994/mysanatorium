<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['discounts'] = Discounts::all();
        return view('admin.discounts.index', $data);
    }

    public function deleted_discounts()
    {
        $data['discounts'] = Discounts::onlyTrashed()->get();
        return view('admin.discounts.deleted', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discounts.create');
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
            'discount_name'        => 'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $discount               = new Discounts();
            $discount->discount_name=$request->discount_name;
            $discount->status       = 1;
            $discount->save();
            return redirect()->route('admin.discounts')->with('success','Məlumatlar daxil edildi!');
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
        $data['discount'] = Discounts::find($id);
        return view('admin.discounts.edit', $data);
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
            'discount_name'        => 'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $discount               = Discounts::find($id);
            $discount->discount_name = $request->discount_name;
            $discount->save();
            return redirect()->route('admin.discounts')->with('success','Məlumatlar dəyişdirildi!');
        }
    }

    public function restore($id)
    {
        Discounts::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Məlumat geri qaytarıldı!');
    }

    public function destroy($id)
    {
        $discount = Discounts::find($id);
        $discount->delete();
        return redirect()->route('admin.discounts')->with('success','Məlumatlar silindi!');
    }

    public function check_status($id)
    {
        $discount = Discounts::find($id);
        if($discount['status'] == 1)
        {
            $discount->status = 0;
        }
        else
        {
            $discount->status = 1;
        }
        $discount->save();

        return "Status dəyişdirildi!";
    }
}
