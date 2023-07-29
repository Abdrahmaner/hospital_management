<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use DB;
use Hash;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
{
    if (Auth::user()->type_user == 1) {
        $data = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'service' => 'required',
            'password' => 'required'
        ]);

        $data['password'] = Hash::make($data['password']); // Hash the password

        User::create($data);
        return redirect('/dashboard');
    }
}

public function edit($id)
{

    if(Auth::user()->type_user==1){
        $user = User::findOrFail($id);
        return view('admin.edit',compact('user'));
    }
    
} 



 public function update(Request $request , $id)
    {

        if(Auth::user()->type_user==1){
            
                 $data = $request->validate([
                 'name'=>'required',
                 'lastname'=>'required',
                 'email'=>'required',
                 'service'=>'required'
                 ]);
                 User::whereId($id)->update($data);
                 return redirect ('/dashboard');
            }
        }
        
    
    public function destroy($id)
    {
        if(Auth::user()->type_user==1){
            User::destroy($id);
            return redirect('/dashboard');
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
     public function index()
    {
        if(Auth::id()){
            if(Auth::user()->type_user==1){
                $users = DB::table('users')->get();
                return view('admin.dashboard',compact('users'));
            }
            else{
                return view('doctors.dashboard');
            }
        }
        else {
            return redirect()->back();
    
        }
    }
    public function doctors()
    {
        if(Auth::id()){
            if(Auth::user()->type_user==1){
                $users = DB::table('users')->where('type_user', '!=', 1)->get();
                return view('admin.doctors',compact('users'));
            }
            else{
                return view('home');
            }
        }
    }
    public function registerdoc()
    {
        if(Auth::user()->type_user==1){
            return view('admin.register');
        }
        else{
            return view('home');
        }
        
    }
}
