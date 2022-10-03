<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LanguageList;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App;

class AdminController extends Controller
{
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            if (\Auth::guard('admin')->attempt(["email"=>$request->email , "password"=>$request->password]))
            {
                return redirect()->route('admin.dashboard');
            }
            else
            {
                session()->flash('error', 'Email və ya şifrə doğru deyil');
                return redirect()->back()->withInput($request->only('email'));
            }
        }

    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);
        $validator = Validator::make($request->all(),[
            'name'      => 'required|min:3|max:20',
            'surname'   => 'required|min:3|max:20',
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $admin->update($request->all());
            return redirect()->back()->with('success', 'Məlumatlar dəyişdirildi !');
        }
    }

    public function update_pi(Request $request, $id)
    {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            $admin = Admin::find($id);
            if($request->file('image')){
                $file= $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/images/users'), $filename);
                $admin->image = $filename;
            }
            $admin->save();
            return redirect()->back()->with('success', 'Profil şəkli dəyişdirildi !');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
