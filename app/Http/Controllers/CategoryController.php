<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\post;
use Gate;

class CategoryController extends Controller
{
    //Get Category Index
    public function index(){
        if(Gate::denies('category-index')){
            abort(403);
        }

    	$categories=categories::all();
    	return view('admin.categoryIndex', compact('categories'));
    }

    public function create(){
        if(Gate::denies('category-create')){
            abort(403);
        }
    	
    	return view('admin.categoryCreat');
    }

    public function store(request $request){
    	$name = $request->input('name');
    	$description = $request->input('description');
    	
    	$category = new categories;
    	$category->name = $name;
    	$category->description = $description;
    	$category->save();
        event(new \App\Events\CategoryCreated($category));
    	return redirect()->route('categoryIndex');	
    }

    public function delete($id){
        

    	$category=categories::find($id);
    	$category->delete();
    	return redirect()->route('categoryIndex');
    }

    public function edit($id){
    	$category=categories::find($id);
    	return view('admin.categoryEdit', compact('category'));
    }

    public function update($id, Request $request){
    	$name = $request->input('name');
    	$description = $request->input('description');

    	$category=categories::find($id);
    	$category->name = $name;
    	$category->description = $description;
    	$category->save();
        event(new \App\Events\CategoryUpdated($category));
    	return redirect()->route('categoryIndex');
    }

     public function category($slug, Request $request){
            $categoryDt=categories::where('slug', '=', $slug)->first();
            // dd($categoryDt);
            $posts=$categoryDt->posts() ->orderBy('id','desc')->where('status',2)->paginate(4);
            // dd($posts);
            $categories=categories::all();
            return view('page.category', compact('categoryDt','posts','categories'));
    }

}
