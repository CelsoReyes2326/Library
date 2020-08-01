<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Category::all();
        return view('/admin/category/index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/admin/category/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $data=new Category($request->all());
        $data->save();
         if($data){
             return redirect()->route('admin.category.index');
         }else{
             return Back();
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($_id)
    {
        if($_id){
            $data=Category::findOrfail($_id);
            return view('admin.category.details',compact('data'));

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $_id)
    {
        $data=Category::findOrfail($_id);
        $data->name=$request->name;
        $data->description=$request->description;

        $data->save();
         if($data){
             return redirect()->route('admin.category.index');
         }else{
             return Back();
         }
    }

    public function form($_id=false){
        if($_id){
            $data=Category::findOrfail($_id);
            return view('admin.category.form',compact('data'));

        }
        

    }

    public function delete($_id)
    {
        $data=Category::destroy($_id);
        if($data){
            return redirect()->route('admin.category.index');
        }else{
            dd('Error, cannot delete this record...');
        }
    }
}
