<?php

namespace App\Http\Controllers;
use MongoDB;
use Illuminate\Http\Request;
use App\Editorial;


class EditorialController extends Controller
{
    public function Index(){
        $posts=Editorial::all();
        return view('/admin/editorial/index',compact('posts'));
    
    }
   
    public function create(){
        $data=(new MongoDB\Client)->Library->countries;
        $countries=$data->find();
        return view('/admin/editorial/create',["countries"=>$countries],compact('data'));
    }

    public function save(Request $request){
        $data= new Editorial($request->all());
        $data->save();
        if($data){
            return redirect()->route('admin.editorial.index');
        }else{
            return Back();
        }
    }
   



    public function Show($_id){
        if($_id){
            $data=Editorial::findOrfail($_id);
            $collection=(new MongoDB\Client)->Library->countries;
            $countries=$collection->find();
            $collection = json_decode($collection, true); 
            return view('admin.editorial.details',["countries"=>$countries],compact('data'));

        }
    }

    
    public function form($_id=false){

        if($_id){
            $data=Editorial::findOrfail($_id);
            $collection=(new MongoDB\Client)->Library->countries;
              $countries=$collection->find();
              return view('admin.editorial.form',["countries"=>$countries],compact('data'));

        }

    }


    public function update(Request $request, $_id){
        $data=Editorial::findOrfail($_id);
        $data->name=$request->name;
        $data->country=$request->country;
        $data->description=$request->description;

        $data->save();
         if($data){
             return redirect()->route('admin.editorial.index');
         }else{
             return Back();
         }
    }


    public function delete($_id)
    {
        $data=Editorial::destroy($_id);
        if($data){
            return redirect()->route('admin.editorial.index');
        }else{
            dd('Error, cannot delete this record...');
        }
    }
    public function EditorialStore(){
        $collection= (new MongoDB\Client)->Library->editorials;
        $editorials=$collection->find();
        return view('Editorials.Index',['editorials'=>$editorials]);
    
    }


    public function Details($_id){
        if($_id){
            $data=Editorial::findOrfail($_id);
            $collection=(new MongoDB\Client)->Library->editorials;
            $collection = json_decode($collection, true); 
            return view('Editorials.Details',compact('data'));

        }
    
    }
}
