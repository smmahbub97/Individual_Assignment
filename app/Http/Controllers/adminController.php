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
//category
    public function view_category(Request $req)
    {
      $id=$req->session()->get('id');
      $cat = DB::table('category')
                    ->get();
      return view('admin/view_category',['cat'=>$cat]);
    }

    public function edit(Request $req, $id)
    {
      $cat = DB::table('category')
      ->where('catid',$id)
      ->first(); 
      return view('admin/edit',['cat'=>$cat]);
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

        return redirect()->route('admin.index')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('category')
            ->where('catid',$req->id)
            ->update([
                'catname' => $req->input('catname'),
                'tag' => $req->input('tag'),
                
                ]
            );
            return redirect()->route('admin.category');
        }
    }

    public function deletecategory(Request $req,$id)
    {
      DB::table('category')->where('catid', $id)->delete();
      return redirect()->route('admin.category');
    } 


//tag

    public function view_tag(Request $req)
    {
      $id=$req->session()->get('id');
      $tags = DB::table('tag')
                    ->get();
      return view('admin/view_tag',['tags'=>$tags]);
    }


    public function edit_tag(Request $req, $id)
    {
      $tags = DB::table('tag')
      ->where('tagid',$id)
      ->first(); 
      return view('admin/edit_tag',['tags'=>$tags]);
    }

    public function update_tag(Request $req)
    {
      $validation = Validator::make($req->all(), [
        //'hashtag'=>'required'
        
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('admin.index')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('tag')
            ->where('tagid',$req->id)
            ->update([
                'hashtag' => $req->input('hashtag')
                
              ]
            );

            return redirect()->route('admin.view_tag');
        }
    }

    public function deletetag(Request $req,$id)
    {
      DB::table('tag')->where('tagid', $id)->delete();
      return redirect()->route('admin.view_tag');
    } 

    public function add(Request $req)
    {
      return view('admin/add');
    }

    public function insert(Request $req)
    {
      $validation = Validator::make($req->all(), [
        //'hashtag'=>'required',
    ]);

    if($validation->fails())
    {
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('admin.add')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else 
        {
            DB::table('tag')
            ->insert([
                'hashtag' => $req->input('hashtag')
                ]
            );

            return redirect()->route('admin.view_tag');
    }

    }




}