<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;
use Carbon\Carbon;

class registerController extends Controller
{
    public function index(Request $req){
    	return view('/register/index');
    }
    public function verification(Request $req){
        $validation = Validator::make($req->all(), [
            'name'=>'required',
            'email'=>'bail|required|email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'role' =>'required'
            
        ]);

        if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();

            return redirect()->route('register.index')
                            ->with('errors', $validation->errors())
                            ->withInput();
            }

            else {
                DB::table('users')->insert([
                    'name' => $req->input('name'),
                    'email' => $req->input('email'),
                    'password' => $req->input('password'),
                    'role'=>'user'
                    ]
                );
                $req->session()->put('email', $req->email);
                return redirect()->route('login.index');
        }
    }
}
