<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;


class authcontroller extends Controller
{
    
    public function dashboard(){
        $users = DB::table('users')->select('id','name','email','image')->get();

        return view('dashboard')->with('users', $users);
    }

    public function ShowLoginPage(){
        return view('adminlogin');
    }

    public function public(){

        if(Auth::guard('admin')->check())
        {
          return redirect()->route('dashboard');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function adminlogin(Request $request){

      // Validation 
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if(!Auth::guard('admin')->check())
        {
            if($request->isMethod('get'))
            {
                $data =$request->all();
                if(isset($data))
                { 
                    $admin =Admin::where('email',$request->email)->first();
                    if(isset($admin))
                    {
                        if(Auth::guard('admin')->attempt(['email' => $request->email , 'password' => $request->password]))
                        { 
                            return redirect()->route('dashboard')->with('message', 'Log-In Successfully!!!');  
                        }
                        else
                        {
                            return back()->with('message', 'CHECK YOUR EMAIL');
                        }
                    }
                    else
                    {
                        return back()->with('message', 'EMAIL NOT MATCH');
                    }
                }   
            }
        }
        else
        {
            return redirect()->route('dashboard');
        }

    }

    public function Adminlogout(){

        Session::flush();
        Auth::logout();
        
        return redirect()->route('login');
    }
}
