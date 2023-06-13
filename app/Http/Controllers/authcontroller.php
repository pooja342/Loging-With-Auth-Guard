<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;
use Auth;
use DB;


class authcontroller extends Controller
{
    
    public function dashboard(Request $req){
        if($req->SearchName)
         {
            $users = DB::table('users')->select('id','name','email','image', 'status')->where('name','LIKE','%'. $req->SearchName.'%')->get()->toArray();
                if (empty($users)) 
                {
                  return back()->with('message','UserName does not exist in the database');   
                }
         }
         else
         {
            $users = DB::table('users')->select('id','name','email','image','status')->get();
         }

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

    public function googlemap()
    {
        // echo "yess";
        return view('search');
    }

    public function getresult(Request $request)
    {
        // echo "yess";
        $location = $request->input('location');
        
        $client = new Client();
        $response = $client->get('https://maps.googleapis.com/maps/api/place/textsearch/json', [
            'query' => [
                'query' => $location,
                'key' => 'AIzaSyCXIPyXxfaxrHeB2cCqFsQ790RnwGF59uU',
            ],
        ]);

        $results = json_decode($response->getBody()->getContents(), true)['results'];

        return view('GoogleMap', compact('results'));
        // echo"yesss";
    }
}
