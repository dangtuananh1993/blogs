<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    public function tag(){
    	return $this->belongsToMany('App\Models\tag','posts_tags','post_id','tag_id');
    }

    public function categories(){
    	return $this->belongsTo('App\Models\categories','category_id','id');
    }

    public function user(){
        return $this->belongsTo('App\Models\user','user_id','id');
    }

    public function getThumnail(){
    	if($this->thumnail){
    		return '/img/' . $this->thumnail;
    	}
    	return 'https://1.bp.blogspot.com/-A7UYXuVWb_Q/XncdHaYbcOI/AAAAAAAAZhM/hYOevjRkrJEZhcXPnfP42nL3ZMu4PvIhgCLcBGAsYHQ/s1600/Trend-Avatar-Facebook%2B%25281%2529.jpg';	
    }

    public function getStrStatus(){
        $statusMapping = array_flip(config('postStatus'));
        return $statusMapping[$this->status];
    }
}
