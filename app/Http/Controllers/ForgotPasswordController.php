<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Mail;
use Str;
use Validator;
use App\Http\Requests\ForgotPassRequest;

class ForgotPasswordController extends Controller
{
    Public function getemail(){
    	return view('email.getforgotpasswordemail');
    }

    Public function getverifycode(Request $request){
    	$email=$request->input('email');
    	$isEmailExist=user::where('email',$email)->first();
    	$token=Str::random(60);
    	$url=route('getverifycodeandtoken',[$email,$token]);
    	$isEmailExist->token_code=$token;
    	$isEmailExist->save();
    	if(!$isEmailExist){
    		return redirect()->back()->withError('Email bạn nhập chưa đúng');
    	} 
    	$data =[
	    	'url' => $url,
    	];

	    Mail::send('Email.sendTokenCodeMail',$data, function($message) use($email){
	    	$message->from('sieudiepvien1s@gmail.com','Tuan Anh');
	    	$message->to($email,'User');
	    	$message->subject('Forgot Password');
	    });
	    return redirect()->back()->withSuccess('Link lấy lại mật khẩu đã được gửi vào mail của bạn');
    }
    Public function getverifycodeandtoken($email,$token){
    	
    	return view('Email.resetpassword',compact('email','token'));
    }
    Public function savenewpassword (ForgotPassRequest $request){
    	// $validator=Validator::make($request->all(),[
     //        'password'=>'required|min:3',
     //        'repassword'=>'required|same:password',
     //    ],
     //    [
     //        'password.required'=>'Bạn chưa nhập password',
     //        'password.min'=>'Password tối thiểu 3 ký tự',
     //        'repassword.required'=>'Bạn chưa nhập lại Password',
     //        'repassword.same'=>'Nhập lại Password phải trùng với password',
     //    ]);
        // dd($validator);
    	$email=$request->input('email');
    	$token=$request->input('token');
    	// $password=$request->input('password');
    	// 	dd($password);
    	// dd($token);
    	$isEmailExist =user::where('email',$email)->where('token_code',$token)->first();
    	if(!$isEmailExist){
    		return redirect()->back()->withError('Your link is not correct');
    	}
    	$newPassword=$request->input('password');
    	$token2=Str::random(60);
    	$isEmailExist->token_code=$token2;
    	$isEmailExist->password=bcrypt($newPassword);
    	$isEmailExist->save();
    	return redirect()->route('login')->withSuccess('Bạn đã thay đổi mật khẩu thành công');	
    }
}
