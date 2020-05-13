<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;

class LoginController extends Controller
{
    
    public function index(Request $req){
        
    	return view('login.index', ['email'=>$req->session()->get('email')]); 
    }

    public function verification(Request $req){
 

       $validation = Validator::make($req->all(), [
            'email'=>'bail|required|email|exists:users,email',
            'password'=>'required'
            
        ]);

        if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();

            return redirect()->route('login.index')
                            ->with('errors', $validation->errors())
                            ->withInput();
            }

            else {
                 $user = DB::table('users')
                    ->where('email', $req->email)
                    ->where('password', $req->password)
                    ->first();
           
              if($user->role=='admin')
              {
                   $req->session()->put('email', $req->email);
                   $req->session()->put('id', $req->id);
                   return redirect()->route('admin.index');
               }
              
              else if($user->role=='user')
              {
                   $req->session()->put('email', $req->email);
                   $req->session()->put('id', $user->id);
                   return redirect()->route('user.index');
               }
               
               else{
                   
                   return redirect()->route('/system/user/login');
               }

        }
    }
            
}