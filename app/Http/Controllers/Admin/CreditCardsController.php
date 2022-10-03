<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CreditCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreditCardsController extends Controller
{
    public function index()
    {
        $data['credit_cards'] = CreditCards::all();
        return view('admin.settings.credit-cards.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.credit-cards.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $credit_cards = new CreditCards();
            $credit_cards->name = $request->name;
            if($request->file('icon')){
                $file= $request->file('icon');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/images/cards'), $filename);
                $credit_cards->icon = $filename;
            }
            $credit_cards->status = 1;
            $credit_cards->save();

            return redirect()->route('admin.credit-cards')->with('success', 'Məlumatlar daxil edildi!');
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
        $data['credit_card'] = CreditCards::find($id);
        return view('admin.settings.credit-cards.edit', $data);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $credit_cards = CreditCards::find($id);
            $credit_cards->name = $request->name;
            if($request->file('icon')){
                $file= $request->file('icon');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/images/cards'), $filename);
                $credit_cards->icon = $filename;
            }
            $credit_cards->status = 1;
            $credit_cards->save();

            return redirect()->route('admin.credit-cards')->with('success', 'Məlumatlar dəyişdirildi!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $credit_cards = CreditCards::find($id);
        $credit_cards->delete();
        return redirect()->route('admin.credit-cards')->with('success','Məlumatlar silindi!');
    }

    public function check_status($id)
    {
        $credit_cards = CreditCards::find($id);
        if($credit_cards['status'] == 1)
        {
            $credit_cards->status = 0;
        }
        else
        {
            $credit_cards->status = 1;
        }
        $credit_cards->save();

        return "Status dəyişdirildi!";
    }

    public function deleted_cards()
    {
        $data['cards'] = CreditCards::onlyTrashed()->get();
        return view('admin.settings.credit-cards.deleted',$data);
    }

    public function restore($id)
    {
        CreditCards::onlyTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Məlumat geri qaytarıldı!');
    }
}
