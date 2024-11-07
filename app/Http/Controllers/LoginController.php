<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
class LoginController extends Controller
{
   
    public function doLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',

        ], [

        ]);

        //dd($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,])) {
            return redirect('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid email/password');
        }
        

        //dd($request->all());


    }
    public function doLogout(Request $request)
    {
    
        Auth::logout();
        return redirect('/');
    }
}
