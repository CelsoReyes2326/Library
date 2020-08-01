<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use DataTables;

class CountryController extends Controller
{ 
    
    public function Show($_id){
        if($_id){
            $data=Country::findOrfail($_id);
            return view('admin.country.details',compact('data'));

        }
    }
    
    
    
    public function form($_id=false){
        if($_id){
            $data=Country::findOrfail($_id);
            return view('admin.country.form',compact('data'));

        }
        

    }

   
    public function create(){
        return view('/admin/country/create');
    }

    public function save(Request $request){
        $data=new Country($request->all());
        $data->created_by=\Auth::user()->email;
        $data->save();
         if($data){
             return redirect()->route('admin.country.index');
         }else{
             return Back();
         }
    }

    public function update(Request $request, $_id){
        $data=Country::findOrfail($_id);
        $data->name=$request->name;
        $data->description=$request->description;

        $data->save();
         if($data){
             return redirect()->route('admin.country.index');
         }else{
             return Back();
         }
    }

    public function index(){
        $posts=Country::all();
        return view('/admin/country/index',compact('posts'));
    }

    public function delete($_id)
    {
        $data=Country::destroy($_id);
        if($data){
            return redirect()->route('admin.country.index');
        }else{
            dd('Error, cannot delete this record...');
        }
    }
}
