<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\models\post;
use App\models\user;
use App\models\comment;

class CommentController extends Controller
{
    public function comment(Request $request){
        $user_id=Auth::id();
        $post_id=$request->input('post_id');
        $slug=$request->input('slug');
        $commentContent=$request->input('comment');

        $comment=new comment();
        $comment->post_id=$post_id;
        $comment->user_id=$user_id;
        $comment->comment=$commentContent;
        $comment->save();

        

        return redirect()->route('article',$slug);
    }
}
