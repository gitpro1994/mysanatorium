<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currencies;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use AmrShawky\LaravelCurrency\Facade\Currency;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['currencies'] = Currencies::all();
        $data['deleted'] = Currencies::onlyTrashed()->count();
        return view('admin.settings.currencies.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.currencies.create');
    }

    public function convert(Request $request)
    {
        $result = Currency::convert()
            ->from($request->from)
            ->to($request->to)
            ->amount($request->amount)
            ->get();

        return $result;
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
            'slug'        => 'required',
            'code'              =>'required',
            'title'             =>'required',
            'currency'      =>'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $currency               = new Currencies;
            $currency->slug         = Str::slug($request->slug);
            $currency->code         = $request->code;
            $currency->title        = $request->title;
            $currency->currency     = $request->currency;
            $currency->symbol       = $request->symbol;
            $currency->status = 1;
            $currency->save();
            return redirect()->route('admin.currencies')->with('success','Məlumatlar daxil edildi!');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['currency'] = Currencies::find($id);
        return view('admin.settings.currency.edit', $data);
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
            'slug'        => 'required',
            'code'        =>'required',
            'title'       =>'required',
            'currency'    =>'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $currency               = new Currencies;
            $currency->slug         = Str::slug($request->slug);
            $currency->code         = $request->code;
            $currency->title        = $request->title;
            $currency->currency     = $request->currency;
            $currency->symbol       = $request->symbol;
            $currency->status = 1;
            $currency->save();
            return redirect()->route('admin.currencies')->with('success','Məlumatlar yeniləndi  !');
        }
    }

    public function deleted_currencies()
    {
        $data['currencies'] = Currencies::onlyTrashed()->get();
        return view('admin.settings.currencies.deleted',$data);
    }

    public function restore($id)
    {
        Currencies::onlyTrashed()->find($id)->restore();
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
        $currency = Currencies::find($id);
        $currency->delete();
        return redirect()->route('admin.currencies')->with('success','Məlumatlar silindi  !');
    }

    public function check_status($id)
    {
        $currency = Currencies::find($id);
        if($currency['status'] == 1)
        {
            $currency->status = 0;
        }
        else
        {
            $currency->status = 1;
        }
        $currency->save();

        return "Status dəyişdirildi!";
    }
}
