<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\Company;
use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['companies'] = Company::all();
        $data['deleted'] = Company::onlyTrashed()->count();
        return view('admin.companies.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['countries'] = Countries::where('status', 1)->get();
        $data['cities'] = Cities::where('status', 1)->get();
        return view('admin.companies.create', $data);
    }

    public function deleted_companies()
    {
        $data['companies'] = Company::onlyTrashed()->get();
        return view('admin.companies.deleted', $data);
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
            'city_id'           => 'required|integer',
            'name'              => 'required',
            'related_person'    => 'required',
            'address'           =>'required',
            'postal_code'       =>'required',
            'representative'    =>'required',
            'tax_number'        =>'required',
            'voen'              =>'required',
            'contact_number'    =>'required',
            'email'             =>'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {

            $company                   = new Company;
            $company->country_id       = $request->country_id;
            $company->city_id          = $request->city_id;
            $company->name             = $request->name;
            $company->related_person   = $request->related_person;
            $company->address          = $request->address;
            $company->postal_code      = $request->postal_code;
            $company->representative   = $request->representative;
            $company->tax_number       = $request->tax_number;
            $company->voen             = $request->voen;
            $company->contact_number   = $request->contact_number;
            $company->email            = $request->email;
            $company->status = 1;
            $company->save();
            return redirect()->route('admin.companies')->with('success','Məlumatlar daxil edildi!');
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
        $data['countries']  = Countries::where('status', 1)->get();
        $data['cities']     = Cities::where('status', 1)->get();
        $data['company']    = Company::find($id);
        return view('admin.companies.edit', $data);
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
            'city_id'           => 'required|integer',
            'name'              => 'required',
            'related_person'    => 'required',
            'address'           =>'required',
            'postal_code'       =>'required',
            'representative'    =>'required',
            'tax_number'        =>'required',
            'voen'              =>'required',
            'contact_number'    =>'required',
            'email'             =>'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {

            $company                   = Company::find($id);
            $company->country_id       = $request->country_id;
            $company->city_id          = $request->city_id;
            $company->name             = $request->name;
            $company->related_person   = $request->related_person;
            $company->address          = $request->address;
            $company->postal_code      = $request->postal_code;
            $company->representative   = $request->representative;
            $company->tax_number       = $request->tax_number;
            $company->voen             = $request->voen;
            $company->contact_number   = $request->contact_number;
            $company->email            = $request->email;
            $company->status = 1;
            $company->save();
            return redirect()->route('admin.companies')->with('success','Məlumatlar yeniləndi!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Company::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Məlumat geri qaytarıldı!');
    }

    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect()->route('admin.companies')->with('success','Məlumatlar silindi!');
    }

    public function check_status($id)
    {
        $company = Company::find($id);
        if($company['status'] == 1)
        {
            $company->status = 0;
        }
        else
        {
            $company->status = 1;
        }
        $company->save();

        return "Status dəyişdirildi!";
    }
}
