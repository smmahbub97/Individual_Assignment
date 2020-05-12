<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;
use Carbon\Carbon;


class managerController extends Controller
{
    public function index(Request $req)
    {
      return view('manager/index');
    } 
    public function view_counter(Request $req)
    {
      $id=$req->session()->get('id');
      $counters = DB::table('buses')
                    ->where('m_id',$id)
                    ->get();
      return view('manager/view_counter',['counters'=>$counters]);
    }
    public function add_bus(Request $req)
    {
      return view('manager/add_bus');
    }
    public function edit_bus(Request $req, $id)
    {
      $bus = DB::table('buses')
      ->where('id',$id)
      ->first(); 
      return view('manager/edit_bus',['bus'=>$bus]);
    }
    public function update_bus(Request $req)
    {
      $validation = Validator::make($req->all(), [
        'name'=>'required',
        'location'=>'required',
        'seat_row' => 'required',
        'seat_column' => 'required',
        'operator' => 'required',
        'company' => 'required'
        
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('manager.addbus')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('buses')->insert([
                'name' => $req->input('name'),
                'location' => $req->input('location'),
                'operator' => $req->input('operator'),
                'seat_row' => $req->input('seat_row'),
                'seat_column' => $req->input('seat_column'),
                'company' => $req->input('company'),
                'm_id' => $req->session()->get('id'),

                ]
            );
            return redirect()->route('manager.allcounter');
        }
    }
    public function insert_bus(Request $req,$id)
    {
      $validation = Validator::make($req->all(), [
        'name'=>'required',
        'location'=>'required',
        'seat_row' => 'required',
        'seat_column' => 'required',
        'operator' => 'required',
        'company' => 'required'
        
    ]);

    if($validation->fails()){
        return back()
                ->with('errors', $validation->errors())
                ->withInput();

        return redirect()->route('manager.editbus')
                        ->with('errors', $validation->errors())
                        ->withInput();
        }

        else {
            DB::table('buses')
            ->where('id',$req->id)
            ->update(
              [
                'name' => $req->name,
                'location' => $req->location,
                'operator' => $req->operator,
                'seat_row' => $req->seat_row,
                'seat_column' => $req->seat_column,
                'company' => $req->company,
                'm_id' => $req->session()->get('id')
                ]
            );
            return redirect()->route('manager.allcounter');
        }
    } 
}