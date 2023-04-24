<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Carbon\Carbon;
use DB;

class UserController extends Controller
{  
    public  $Ctime;
    public  $date;


    public function __construct()
    {
        $this->Ctime = Carbon::now()->toArray();
        $this->date = $this->Ctime['formatted'];
    }


    public function AddUser(){

        return view('register');
    }

    public function UserRegister(Request $request){
         
           $request->validate([
            'email' => 'required|unique:users|max:255',
            'name' => 'required',
            'password' => 'min:8 | required',
            'file' => 'required',
         ]);

            $filename = time() . '.' . $request->file->extension();
            $request->file->move(public_path('UserProfileImages'), $filename);

            $data=array('name'=>$request->input('name'),"email"=>$request->input('email'),
                        "password"=>Hash::make($request->input('password')), "image" => $filename ,
                        "created_at" => $this->date , "updated_at" => $this->date);

            DB::table('users')->insert($data);
         
            return redirect()->route('dashboard');
    }

    public function DeleteUserRecord($deleteUserRecord){
           DB::table('users')->where('id', $deleteUserRecord)->delete();
           return redirect()->route('dashboard');
    }

    public function ShowUpdateForm($UserID){
       
        $data = DB::table('users')->find($UserID);
        return view('UserFormUpdated',compact('data'));

    }

    public function UpdateUserRecord(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'password' => 'min:8 | required',
            'file' => 'required',
         ]);

         $filename = time() . '.' . $request->file->extension();
         $request->file->move(public_path('UserProfileImages'), $filename);
         DB::table("users")->where('id',$request->UserID)
         ->update(['name' => $request->name , 'email' => $request->email , 
                'password' => Hash::make($request->password),
                'image' => $filename , 'updated_at' => $this->date]);

         return redirect()->route('dashboard');
    }
    public function changeStatus(Request $request){
          $data =$request->all();
          $status = $data['status'] > 0 ? "Active" : "Pending";
          DB::table("users")->where('id',$data['user_id'])->update(['status' => $status]);
        //    return response()->json(['success'=>'Status change successfully.']);
          return $status;
    }
}
