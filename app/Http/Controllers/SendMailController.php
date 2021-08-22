<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendEmail;

class SendMailController extends Controller
{
    Public function sendmail(){
    	$data =[
    		'title' => 'Xin chào bạn',
    		'body' => 'Đây là mail test',
    	];
    	Mail::send('Email.sendTokenCodeMail',$data, function($message){
    		$message->from('sieudiepvien1s@gmail.com','Tuan Anh');
    		$message->to('dangtuananh.hvtc@gmail.com');
    		$message->subject('Test Laravel Mail');
    	});
    }
}
