<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Str;

class VerifyUserController extends Controller
{
    Public function getverifyUsercode ($email,$token) {
    	return view('Email.reVerifyUser', compact('email','token'));
    }
    Public function verifyaccount(Request $request){
    	$email=$request->input('email');
    	$token=$request->input('token');
    	$token2=Str::random(40);
    	// dd($email);
    	$userCheck=user::where('email',$email)->where('token_code',$token)->first();
    	if(!$userCheck){
    		return redirect()->route('login')->withError('Your link is not correct');
    	}
    	$userCheck->active_user=2;
    	$userCheck->token_code=$token2;
    	$userCheck->save();
    	return redirect()->route('login')->withSuccess('Chúc mừng bạn đã kích hoạt tài khoản thành công');
    }
}
