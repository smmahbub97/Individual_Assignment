<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;
use Carbon\Carbon;

class adminController extends Controller
{
    public function index(Request $req)
    {
      return view('admin/index');
    } 

    public function view_category(Request $req)
    {
      $id=$req->session()->get('id');
      $categories = DB::table('category')
                    ->where('catid',$id)
                    ->get();
      return view('admin/view_category',['categories'=>$categories]);
    }
    
    public function view_all_staff(Request $req)
    {
      $users = DB::table('users')
                    ->where('role','supportstaff')
                    ->get();
      return view('admin/view_all_staff',['users'=>$users]);
    }
    

    public function add(Request $req)
    {
      return view('admin/add');
    } 
    public function insert(Request $req)
    {
      $validation = Validator::make($req->all(), [
        'name'=>'required',
        'email'=>'bail|required|email',
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:4',
        
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('admin.add')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('users')->insert([
                'name' => $req->input('name'),
                'email' => $req->input('email'),
                'password' => $req->input('password'),
                'role'=> $req->input('role')
                ]
            );
            return redirect()->route('admin.allstaff');
    }

    } 
    public function deletemanager(Request $req,$id)
    {
      DB::table('users')->where('id', $id)->delete();
      return redirect()->route('admin.view_list');
    } 
}