<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class categories extends Model
{
    use HasFactory;

     public function posts(){
    	return $this->hasMany('App\Models\post','category_id','id');
    }

}
