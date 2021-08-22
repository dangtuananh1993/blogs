<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tag;
use App\Models\categories;
use App\Models\post;
use Gate;

class TagController extends Controller
{
     //Get Tag Index
    public function index(){
    	$tags=tag::all();
    	
    	return view('admin.tagIndex', compact('tags'));
    }

    public function create(){
    	
    	return view('admin.tagCreat');
    }

    public function store(Request $request){
    	
    	$name = $request->input('name');
    	$description = $request->input('description');
    	
    	$tag = new tag;
    	$tag->name = $name;
    	$tag->description = $description;
    	$tag->save();
        event(new \App\Events\TagCreated($tag));
    	return redirect()->route('tagIndex');
    }

    public function delete($id){
        if(Gate::denies('tag-delete')){
            abort(403);
        }
            
    	$tag = tag::find($id);
    	$tag->delete();
    	return redirect()->route('tagIndex');
    }

    public function edit($id){
    	$tag=tag::find($id);
    	return view('admin.tagEdit', compact('tag'));
    }

    public function update($id, Request $request){
    	$name = $request->input('name');
    	$description = $request->input('description');

    	$tag=tag::find($id);
    	$tag->name = $name;
    	$tag->description = $description;
    	$tag->save();
        event(new \App\Events\TagUpdated($tag));
    	return redirect()->route('tagIndex');
    }

    public function tag($slug){
        $tagDt=tag::where('slug',$slug)->first();
        // dd($tagDt);
        $categories=categories::all();

        $posts=$tagDt->post() ->orderBy('id','desc')->where('status',2)->paginate(4);

        return view('page.tagPost', compact('tagDt', 'posts','categories'));
        
    }

}
