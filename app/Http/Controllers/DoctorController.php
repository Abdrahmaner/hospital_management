<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index()
    {
        return view('doctors.dashboard');
    }
    public function profile()
    {
        return view('doctors.profile');
    }

    public function edit()
{

    if(Auth::user()->type_user==0){
        $user = User::findOrFail(Auth::user()->id);
        return view('doctors.edit',compact('user'));
    }
    
} 

 public function update(Request $request )
    {

        if(Auth::user()->type_user==0){
            
                 $data = $request->validate([
                 'name'=>'required',
                 'lastname'=>'required',
                 'email'=>'required',
                 'service'=>'required'
                 ]);
                 User::whereId(Auth::user()->id)->update($data);
                 return redirect ('/Myprofile');
            }
        }
        
}
