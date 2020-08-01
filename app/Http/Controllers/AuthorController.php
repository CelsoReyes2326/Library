<?php

namespace App\Http\Controllers;
use MongoDB;
use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function Index(){
        $posts=Author::all();
        return view('/admin/author/index',compact('posts'));
    }


    public function create(){
        $data=(new MongoDB\Client)->Library->countries;
        $countries=$data->find();
        return view('/admin/author/create',["countries"=>$countries],compact('data'));
    }

    public function Show($_id){
        if($_id){
            $data=Author::findOrfail($_id);
            $collection=(new MongoDB\Client)->Library->countries;
            $countries=$collection->find();
            $collection = json_decode($collection, true); 
            return view('admin.author.details',["countries"=>$countries],compact('data'));
        }
    }

    public function save(Request $request){
        $data= new Author($request->all());
        $data->save();
        if($data){
            return redirect()->route('admin.author.index');
        }else{
            return Back();
        }
    }

    public function form($_id=false){

        if($_id){
            $data=Author::findOrfail($_id);
            $collection=(new MongoDB\Client)->Library->countries;
              $countries=$collection->find();
              return view('admin.author.form',["countries"=>$countries],compact('data'));

        }

    }

    public function update(Request $request, $_id){
        $data=Author::findOrfail($_id);
        $data->name=$request->name;
        $data->last_name=$request->last_name;
        $data->country=$request->country;

        $data->save();
         if($data){
             return redirect()->route('admin.author.index');
         }else{
             return Back();
         }
    }


    public function delete($_id)
    {
        $data=Author::destroy($_id);
        if($data){
            return redirect()->route('admin.author.index');
        }else{
            dd('Error, cannot delete this record...');
        }
    }


    public function AuthorStore(){
        $collection= (new MongoDB\Client)->Library->authors;
        $authorCount=$collection->count();
        $page=request("pg")==0?1: request("pg");
        $authors=$collection->find([],["limit"=>5,"skip"=>($page)*5]);
        return view('Authors.Index',['authors'=>$authors, 'authorCount'=>$authorCount]);
    
    }


    public function Details($_id){
        if($_id){
            $data=Author::findOrfail($_id);
            $collection=(new MongoDB\Client)->Library->countries;
            $countries=$collection->find();
            $collection = json_decode($collection, true); 
            return view('Authors.Details',["countries"=>$countries],compact('data'));

        }
    
    }

}
