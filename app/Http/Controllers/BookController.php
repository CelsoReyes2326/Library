<?php

namespace App\Http\Controllers;
use MongoDB;
use Illuminate\Http\Request;
use App\Book;


class BookController extends Controller
{
    public function Index(){
        $posts=Book::all();
        // $bookCount=$posts->count();
        // $page=request("pg")==0?1: request("pg");
        // $books=$posts->find([],["limit"=>12,"skip"=>($page)*12]);
        return view('/admin/book/index',compact('posts'));
    
    }
   
    public function create(){
        // $collection=(new MongoDB\Client)->fivedstore->Categories;
        // $categories=$collection->find();
        $data=(new MongoDB\Client)->Library->countries;
        $countries=$data->find();
        $data=(new MongoDB\Client)->Library->languages;
        $languages=$data->find();
        $data=(new MongoDB\Client)->Library->authors;
        $authors=$data->find();
        $data=(new MongoDB\Client)->Library->editorials;
        $editorials=$data->find();
        $data=(new MongoDB\Client)->Library->categories;
        $categories=$data->find();


        return view('/admin/book/create',["countries"=>$countries,"languages"=>$languages,"authors"=>$authors,"editorials"=>$editorials,"categories"=>$categories],compact('data'));
    }

    public function save(Request $request){
        $data= new Book($request->all());
        $data->save();
        if($data){
            return redirect()->route('admin.book.index');
        }else{
            return Back();
        }
    }
   



    public function Show($_id){
        if($_id){
            $data=Book::findOrfail($_id);
            $collection=(new MongoDB\Client)->Library->countries;
            $countries=$collection->find();
            $collection = json_decode($collection, true); 
            $collection=(new MongoDB\Client)->Library->languages;
            $languages=$collection->find();
            $collection = json_decode($collection, true); 
            $collection=(new MongoDB\Client)->Library->authors;
            $authors=$collection->find();
            $collection = json_decode($collection, true); 
            $collection=(new MongoDB\Client)->Library->editorials;
            $editorials=$collection->find();
            $collection = json_decode($collection, true); 
            $collection=(new MongoDB\Client)->Library->categories;
            $categories=$collection->find();
            $collection = json_decode($collection, true); 
            return view('admin.book.details',["countries"=>$countries,"languages"=>$languages,"authors"=>$authors,"editorials"=>$editorials,"categories"=>$categories],compact('data'));

        }
    }

    
    public function form($_id=false){

        if($_id){
            $data=Book::findOrfail($_id);
           
            $collection=(new MongoDB\Client)->Library->countries;
        $countries=$collection->find();
        $collection=(new MongoDB\Client)->Library->languages;
        $languages=$collection->find();
        $collection=(new MongoDB\Client)->Library->authors;
        $authors=$collection->find();
        $collection=(new MongoDB\Client)->Library->editorials;
        $editorials=$collection->find();
        $collection=(new MongoDB\Client)->Library->categories;
        $categories=$collection->find();
        
        return view('admin.book.form',["countries"=>$countries,"languages"=>$languages,"authors"=>$authors,"editorials"=>$editorials,"categories"=>$categories],compact('data'));
        }
        else
        {
            return Back();
        }
    }


    public function update(Request $request, $_id){
        $data=Book::findOrfail($_id);
        $data->title=$request->title;
        $data->isbn=$request->isbn;
        $data->description=$request->description;
        $data->country=$request->country;
        $data->language=$request->language;
        $data->author=$request->author;
        $data->editorial=$request->editorial;
        $data->category=$request->category;

        $data->save();
         if($data){
             return redirect()->route('admin.book.index');
         }else{
             return Back();
         }
    }


    public function delete($_id)
    {
        $data=Book::destroy($_id);
        if($data){
            return redirect()->route('admin.book.index');
        }else{
            dd('Error, cannot delete this record...');
        }
    }


    public function BookStore(){
        $collection= (new MongoDB\Client)->Library->books;
        $bookCount=$collection->count();
        $page=request("pg")==0?1: request("pg");
        $books=$collection->find([],["limit"=>12,"skip"=>($page)*12]);
        return view('Books.Index',['books'=>$books, 'bookCount'=>$bookCount]);
    
    }


    public function Details($_id){
        if($_id){
            $data=Book::findOrfail($_id);
            $collection=(new MongoDB\Client)->Library->countries;
            $countries=$collection->find();
            $collection = json_decode($collection, true); 
            $collection=(new MongoDB\Client)->Library->languages;
            $languages=$collection->find();
            $collection = json_decode($collection, true); 
            $collection=(new MongoDB\Client)->Library->authors;
            $authors=$collection->find();
            $collection = json_decode($collection, true); 
            $collection=(new MongoDB\Client)->Library->editorials;
            $editorials=$collection->find();
            $collection = json_decode($collection, true); 
            $collection=(new MongoDB\Client)->Library->categories;
            $categories=$collection->find();
            $collection = json_decode($collection, true); 
            return view('Books.Details',["countries"=>$countries,"languages"=>$languages,"authors"=>$authors,"editorials"=>$editorials,"categories"=>$categories],compact('data'));

        }
    }
}
