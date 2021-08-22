<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Auth;
use Str;
use App\Models\user;
use Hash;

class ChangePasswordController extends Controller
{
	Public function getformchangepassword(){
		return view('Email.getFormChangePassword');
	}

    Public function sendpasswordtoken(Request $request){
    	$email=$request->input('email');
    	$checkUser=Auth::user()->where('email',$email)->first();
    	$token=Str::random(40);
    	
    	$url=route('checkchangepasswordtoken',[$email,$token]);

    	if(!$checkUser){
    		return redirect()->route('getformchangepassword')->withError('bạn nhập email chưa đúng');
    	}
    	$checkUser->token_code=$token;
    	$checkUser->save();
    	$data=[
    		'url'=>$url,
    	];

    	Mail::send('Email.sendmailchangeword',$data, function($message) use($email){
            $message->from('sieudiepvien1s@gmail.com','Tuan Anh');
            $message->to($email,'User');
            $message->subject('Change Password');
    	});
    	return redirect()->route('login')->withSuccess('Link xác nhận thay đổi mật khẩu đã được gửi vào mail của bạn');
    }

    Public function checkchangepasswordtoken($email,$token){
    	return view('Email.channgePassword',compact('email','token'));
    }

    Public function savechangedpassword(Request $request){
    	$email=$request->input('email');
    	$token=$request->input('token');
    	$password=$request->input('password');

    	$password1=user::where('email',$email)->first();
    	$password2=$password1->password;
    	// dd($password2);
    	// dd(hash::check($password,$password2));
    	$newpassword=bcrypt($request->input('newpassword'));
    	// dd($password);

    	$checkUser=user::where('email',$email)->where('token_code',$token)->first();

    	if(!hash::check($password,$password2)){
    		return redirect()->back()->withError('bạn đã nhập sai mật khẩu');
    	}else{ 
    		if(!$checkUser){
    			return redirect()->back()->withError('link của bạn đã hết hạn');
    		}
    	$newPassword=$request->input('newpassword');
    	$token2=Str::random(40);
    	$checkUser->token_code=$token2;
    	$checkUser->password=$newpassword;
    	$checkUser->save();

    	return redirect()->route('login')->withSuccess('Chúc mừng bạn đã thay đổi mật khẩu thành công');

    	}
    }

}
