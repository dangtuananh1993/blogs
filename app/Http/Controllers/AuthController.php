<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Auth;
use Gate;
use Str;
use Mail;
use App\Http\Requests\RegisterRequest;


class AuthController extends Controller
{
	//Get form log in
    public function getFormLogIn(){
    	
    	return view('auth.login');
    }

    public function login(Request $request){
        $username=$request->input('email');
        $password=$request->input('password');


            // // dd($username,$password);
            // dd(Auth::attempt([
            //     'email'=> $username,
            //     'password'=> $password
            // ]));
        //Hàm attempt là hàm kiểm tra xem mật khẩu và tài khoản nhập vào có khớp trong cơ sở dữ liệu không, nếu khớp thì trả về giá trị true, password khi lưu vào cơ sở dữ liệu phải để dạng bycrypt nếu không hàm attempt sẽ luôn trả về giá trị false

        $data = [
            'email'=> $username,
            'password'=> $password,
            'active_user'=> 2,
        ];

        if(Auth::attempt($data)){
            // Auth::loginUsingId(Auth::id());
            return redirect()->route('home');
        } else{ 
            
            return redirect()->route('loginGetForm')->withError('Đăng nhập thất bại');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('loginGetForm');
    }

    // Get form register
    public function getFormRegister(){
    	
    	return view('auth.register');
    }

    public function register(RegisterRequest $request){
        $name=$request->input('name');
        $email=$request->input('email');
        $password=$request->input('password');
        $address=$request->input('address');
        $bio=$request->input('bio');
        $gender=$request->input('gender');
        $type=$request->input('type');
        $active_user=$request->input('active_user');
        $token = Str::random(40);

        $user = new User();
        $user->name=$name;
        $user->email=$email;
        $user->password=bcrypt($password);
        $user->address=$address;
        $user->bio=$bio;
        $user->gender=$gender;
        $user->type=$type;
        $user->active_user=$active_user;
        $user->token_code=$token;
        

        $url= route('getverifyUsercode',[$email,$token]);
        
        $data=[
            'url' => $url,
        ];
        Mail::send('Email.sendVerigyUser',$data, function($message) use($email){
            $message->from('sieudiepvien1s@gmail.com','Tuan Anh');
            $message->to($email,'User');
            $message->subject('Verify account');
        });
        $user->save();

        return redirect()->route('login')->withSuccess('mã kích hoạt đã được gửi vào email của bạn');

    }

    public function user(){
        if(Gate::denies('user-roles')){
            abort(403);
             }

        $users=user::all();
        return view('admin.user', compact('users'));
    }

    public function useredit($id){
        $user=user::find($id);
        $roles=role::all();
        return view('admin.useredit', compact('user','roles'));
    }

    public function userupdate($id, request $request){
        $type=$request->input('type');
        $user=user::find($id);
        $user->type=$type;
        $user->save();
       return redirect()->route('user');
    }

}
