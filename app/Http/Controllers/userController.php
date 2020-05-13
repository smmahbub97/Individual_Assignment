<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;
use Carbon\Carbon;

class userController extends Controller
{
    public function index(Request $req)
    {
      return view('user/index');
    } 

    public function view_category(Request $req)
    {
      $id=$req->session()->get('id');
      $categories = DB::table('category')
                    ->get();
      return view('user/view_category',['categories'=>$categories]);
    }

    public function edit(Request $req, $id)
    {
      $cat = DB::table('category')
      ->where('catid',$id)
      ->first(); 
      return view('user/edit',['cat'=>$cat]);
    }

    public function update_category(Request $req)
    {
      $validation = Validator::make($req->all(), [
        'catname'=>'required',
        'tag'=>'required',
        
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('user.index')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('category')->insert([
                'catname' => $req->input('catname'),
                'tag' => $req->input('tag'),
                
                ]
            );
            return redirect()->route('user.category');
        }
    }


    public function deletecategory(Request $req,$id)
    {
      DB::table('category')->where('catid', $id)->delete();
      return redirect()->route('user.category');
    } 


//tag

    public function view_tag(Request $req)
    {
      $id=$req->session()->get('id');
      $tags = DB::table('tag')
                    ->get();
      return view('user/view_tag',['tags'=>$tags]);
    }


    public function edit_tag(Request $req, $id)
    {
      $tags = DB::table('tag')
      ->where('tagid',$id)
      ->first(); 
      return view('user/edit_tag',['tags'=>$tags]);
    }

    public function update_tag(Request $req)
    {
      $validation = Validator::make($req->all(), [
        'tag'=>'required'
        
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('user.index')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('tag')->insert([
                'tag' => $req->input('tag'),
                
                ]
            );
            return redirect()->route('user.view_tag');
        }
    }

    public function deletetag(Request $req,$id)
    {
      DB::table('tag')->where('tagid', $id)->delete();
      return redirect()->route('user.view_tag');
    } 

    public function add(Request $req)
    {
      return view('user/add');
    }

    public function insert(Request $req)
    {
      $validation = Validator::make($req->all(), [
        'tag'=>'required',
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('user.add')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('tag')->insert([
                'tag' => $req->input('tag'),
                ]
            );
            return redirect()->route('user.tag');
    }
}


}