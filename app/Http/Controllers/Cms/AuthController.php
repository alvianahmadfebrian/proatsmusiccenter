<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('cms.auth.login');
    }

    public function authenticate(Request $request)
    {
        $admin = Admin::where('username',$request->username)->first();

        if(!$admin){
            return back()->with('error','Username salah');
        }

        if(!Hash::check($request->password,$admin->password)){
            return back()->with('error','Password salah');
        }

        session([
            'admin_id'=>$admin->id,
            'admin_username'=>$admin->username
        ]);

        return redirect('/cms-admin/dashboard');
    }

    public function logout()
    {
        session()->flush();

        return redirect('/cms-admin/login');
    }
}
