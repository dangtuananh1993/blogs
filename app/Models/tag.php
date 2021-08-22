<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;

    public function post(){
    	return $this->belongsToMany('App\Models\post','posts_tags','tag_id','post_id');
    }

    
}
