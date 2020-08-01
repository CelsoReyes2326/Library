<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;

class LanguageController extends Controller
{ 
    
    public function Show($_id){
        if($_id){
            $data=Language::findOrfail($_id);
            return view('admin.language.details',compact('data'));

        }
    }
    
    
    
    public function form($_id=false){
        if($_id){
            $data=Language::findOrfail($_id);
            return view('admin.language.form',compact('data'));

        }
        

    }

   
    public function create(){
        return view('/admin/language/create');
    }

    public function save(Request $request){
        $data=new Language($request->all());
        $data->created_by=\Auth::user()->email;
        $data->save();
         if($data){
             return redirect()->route('admin.language.index');
         }else{
             return Back();
         }
    }

    public function update(Request $request, $_id){
        $data=Language::findOrfail($_id);
        $data->name=$request->name;
        $data->description=$request->description;

        $data->save();
         if($data){
             return redirect()->route('admin.language.index');
         }else{
             return Back();
         }
    }

    public function index(){
        $posts=Language::all();
        return view('/admin/language/index',compact('posts'));
    }

    public function delete($_id)
    {
        $data=Language::destroy($_id);
        if($data){
            return redirect()->route('admin.language.index');
        }else{
            dd('Error, cannot delete this record...');
        }
    }
}
