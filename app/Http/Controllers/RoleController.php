<?php

namespace App\Http\Controllers;
use MongoDB;
use Illuminate\Http\Request;
use App\Role;
class RoleController extends Controller
{ 
    
    public function Show($_id){
        if($_id){
            $data=Role::findOrfail($_id);
            return view('role.details',compact('data'));

        }
    }
    
    
    
    public function form($_id=false){
        if($_id){
            $data=Role::findOrfail($_id);
            return view('role.form',compact('data'));

        }
        

    }

   
    public function create(){
        return view('role/create');
    }

    public function save(Request $request){
        $data=new Role($request->all());
        $data->save();
         if($data){
             return redirect()->route('role.index');
         }else{
             return Back();
         }
    }

    public function update(Request $request, $_id){
        $data=Role::findOrfail($_id);
        $data->name=$request->name;
        $data->description=$request->description;

        $data->save();
         if($data){
             return redirect()->route('role.index');
         }else{
             return Back();
         }
    }

    public function index(){
        $posts=Role::all();
        return view('role/index',compact('posts'));
    }

    public function delete($_id)
    {
        $data=Role::destroy($_id);
        if($data){
            return redirect()->route('role.index');
        }else{
            dd('Error, cannot delete this record...');
        }
    }
}
