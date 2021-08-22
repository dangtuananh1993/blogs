<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\categories;
use App\Models\tag;
use App\Models\comment;
use App\Models\user;
use Illuminate\Support\Str;
use Gate;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Validator;
use Auth;

class PostController extends Controller
{
	//Get Post Index
    public function index(Request $request){
        if(Gate::denies('post-index')){
            abort(403);
        }

    	$postQuery=post::query(); //Tạo biến để truy vấn
        $categories=categories::all(); //Tạo biến để truyền category sang view
        $keyword=$request->input('keyword'); //Lấy giá trị ô input người dùng nhập vào
        $category_id=$request->input('category_id'); //Lấy giá trị category (id của category) người dùng nhập vào
        $tags_id=$request->input('tagsId',[]);//Lấy giá trị tags (id của tag) người dùng nhập vào
        $status=$request->input('status');
        $postQuery->latest();



        //Kiểm tra nếu có keyword người dùng nhập vào thì truy vấn
        if($keyword){
            $postQuery->where('title','like',"%{$keyword}%");
        }

        if($category_id){
            $postQuery->where('category_id',$category_id);
        }

        if($status){
            $postQuery->where('status',$status);   
        }

        /*check điều kiện nếu có $tags_id thì sẽ truy vấn $ postQuery đến quan hệ tag, function whereIn để tìm những id trong bảng tags nằm trong mảng $tags_id */
        if(count($tags_id)>0){
            $postQuery->whereHas('tag', function($query) use($tags_id){
                $query->whereIn('tags.id',$tags_id);
            });
        }

        $tags=tag::all();
        $posts = $postQuery->paginate(5);
    	return view('admin.index', compact('posts', 'categories','tags'));
    }

    //Get Post
    public function create(){
        if(Gate::denies('post-creat')){
            abort(403);
        }

        $categories=categories::all();
        $tags=tag::all();
    	return view('admin.postCreate', compact('categories','tags'));

    }

    public function store(CreatePostRequest $request){
    	$title=$request->input('title');
    	$description=$request->input('description');
    	$content=$request->input('content');
    	$category_id=$request->input('category');
        $outstanding=$request->input('outstanding');
        $status=$request->input('status');
        $tags=$request->input('tag',[]);

    	$post = new post;
    	$post->title=$title;
    	$post->description=$description;
    	$post->content=$content;
    	$post->category_id=$category_id;
        $post->outstanding=$outstanding;
        $post->status=$status;
    	
        $filename=uniqid().time().'.'.$request->file('thumnail')->extension();
        $request->file('thumnail')->move(public_path('img'),$filename);
        $post->thumnail=$filename;

        $post->save();
        $post->tag()->sync($tags); //lưu lại trong bảng trung gian
        event(new \App\Events\SlugPostCreated($post));
    	if(Auth::user()->type==2){
            return redirect()->route('index');
        }
        if(Auth::user()->type==3){
            return redirect()->route('index');
        }      
        if(Auth::user()->type==4){
            return redirect()->route('postcollaborators');
        }
    }

     public function delete($id){
        if(Gate::denies('post-delete')){
            abort(403);
        }

    	$post=post::find($id);

        $destinationPath='img/'.$post->thumnail;
        
        if(file_exists($destinationPath)){
            unlink($destinationPath);
        }

    	$post->delete();
    	if(Auth::user()->type==2){
            return redirect()->route('index');
        }
        if(Auth::user()->type==3){
            return redirect()->route('index');
        }      
        if(Auth::user()->type==4){
            return redirect()->route('postcollaborators');
        }
    }

     public function edit($id){
        if(Gate::denies('post-creat')){
            abort(403);
        }

     	$post=post::find($id);
        $categories=categories::all();
        $tags=tag::all();
    	return view('admin.postEdit', compact('post','categories','tags'));
    }

     public function update($id, Request $request){
        $validator=Validator::make($request->all(),[
            'title'=>'required|min:16|unique:posts,title,'.$id.',id',
            'description'=>'required',
            'category'=>'required',
            'content'=>'required',
        ],
        [
            'title.required'=>'Bạn chưa nhập tiêu đề',
            'title.min'=>'Tiêu đề tối thiểu 16 ký tự',
            'title.unique'=>'Tiêu đề đã tồn tại',
            'description.required'=>'Bạn chưa nhập mô tả',
            'category.required'=>'Bạn chưa chọn danh mục',
            'content.required'=>'Bạn chưa nhập nội dung bài viết',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

    	$title=$request->input('title');
    	$description=$request->input('description');
    	$content=$request->input('content');
    	$category_id=$request->input('category');
        $outstanding=$request->input('outstanding');
        $status=$request->input('status');
        $tags=$request->input('tag',[]);

    	$post = post::find($id);
    	$post->title=$title;
    	$post->description=$description;
    	$post->content=$content;
    	$post->category_id=$category_id;
        $post->outstanding=$outstanding;
        $post->status=$status;
        if($request->file('thumnail')){
            $destinationPath='img/'.$post->thumnail;
        
            if(file_exists($destinationPath)){
                unlink($destinationPath);
            }
            $filename=uniqid().time().'.'.$request->file('thumnail')->extension();
            $request->file('thumnail')->move(public_path('img'),$filename);
            $post->thumnail=$filename;
        }

    	$post->save();
        $post->tag()->sync($tags); //lưu lại trong bảng trung gian quan hệ post và tag
        event(new \App\Events\PostUpdated($post));
    	if(Auth::user()->type==2){
            return redirect()->route('index');
        }
        if(Auth::user()->type==3){
            return redirect()->route('index');
        }      
        if(Auth::user()->type==4){
            return redirect()->route('postcollaborators');
        }
    }

    public function home(){
        $post9=post::orderBy('id','desc')->where('outstanding',2)->where('status',2)->paginate(10);
        $post4=post::orderBy('id','desc')->paginate(4);
        
        $postktns=post::orderBy('week_views','desc')->where('status',2)->paginate(5);
        $categories=categories::all();

        return view('page.home',compact('post9', 'postktns', 'categories', 'post4','categories'));
    }

    public function master(){
            if(Gate::denies('master-layout')){
            abort(403);
             }

            $categories=categories::all();
            return view('page.masterpage', compact('categories'));
    }

    public function article($slug){
            $article=post::where('slug', '=', $slug)->first();
            // dd($article);
            $categories=categories::all();
            $comments=comment::all();
            
            return view('page.article', compact('article','categories','comments'));
    }

    public function postcollaborators(Request $request){
        if(Gate::denies('collaborators-posts')){
            abort(403);
        }

        //$user=Auth::id();
        //$posts=$user->user()->paginate(4);
        //$postQuery= $user->posts()::query();

        $postQuery=post::query(); //Tạo biến để truy vấn

        $categories=categories::all(); //Tạo biến để truyền category sang view
        $tags=tag::all();
        $user_type=Auth::user()->type;
        $user_id=Auth::id();
        // dd($user_type);
        $keyword=$request->input('keyword'); //Lấy giá trị ô input người dùng nhập vào
        $category_id=$request->input('category_id'); //Lấy giá trị category (id của category) người dùng nhập vào
        $tags_id=$request->input('tagsId',[]);//Lấy giá trị tags (id của tag) người dùng nhập vào
        
        $status=$request->input('status');
        $postQuery->latest();



        //Kiểm tra nếu có keyword người dùng nhập vào thì truy vấn
        if($keyword){
            $postQuery->where('title','like',"%{$keyword}%");
        }

        if($category_id){
            $postQuery->where('category_id',$category_id);
        }

        if($status){
            $postQuery->where('status',$status);   
        }
        if($user_type==4){
            $postQuery->where('user_id',$user_id);   
        }

        /*check điều kiện nếu có $tags_id thì sẽ truy vấn $ postQuery đến quan hệ tag, function whereIn để tìm những id trong bảng tags nằm trong mảng $tags_id */
        if(count($tags_id)>0){
            $postQuery->whereHas('tag', function($query) use($tags_id){
                $query->whereIn('tags.id',$tags_id);
            });
        }

        $posts = $postQuery->paginate(3);
        return view('admin.postCollaborators', compact('posts', 'categories','tags'));
    }

    

}
