<?php

namespace App\Http\Controllers;

use App\Mail\ActiveMail;
use App\Mail\ForgetMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Monolog\Handler\NewRelicHandler;
use Str;
class AuthController extends Controller
{
    public function showFormRegister()
    {
        return view('admin.auth.register');
    }

    public function register( Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required'
        ],[
            'email.required' => 'Bạn cần nhập email',
            'name.required' => 'Bạn cần nhập tên',
            'email.unique' => 'Email này đã tồn tại'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->token = strtoupper(Str::random(20));
        $user->save();
        $mailable = new ActiveMail($user);
        Mail::to($user->email)->queue($mailable);
        return redirect()->route('show-form-register')->with('success', 'Chúc Mừng Bạn Đã Đăng Đăng Ký Thành Công! Vui lòng check mail');
    }

    public function showFormLogin(){
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password])) {
            return redirect()->route('show-profile');
        }else
            return redirect()->route('show-form-login')->with('error', 'Email Hoặc Mật Khẩu Không Chính Xác');
    }

    public function showProfile(){

        return view('admin.auth.profile');
    }

    public function Profile(Request $request){
        $user = User::find(\auth()->id());
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->change_password == 'on') {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('show-profile')->with('success','Cập Nhật Thành Công');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('show-form-login');
    }

    public function active(User $user, $token)
    {
        if ($user->token === $token) {
            $user->update(['status' => 1]);
            return 'Xac nhan tai khoan thanh cong';
        } else {
            return 'XU lys tiep';
        }
    }

    public function forgetPass()
    {
        return view('admin.auth.forget_pass');
    }

    public function postForgetPass(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|exists:users',
        ],[
            'email.required' => 'Bạn cần nhập email',
            'email.exists' => 'Email này không tồn tại trong hệ thống'
        ]);
        $token = strtoupper(Str::random(20));
        $user = User::where('email', $request->email)->first();
        $user->update(['token' => $token]);
        $mailable = new ForgetMail($user);
        Mail::to($user->email)->queue($mailable);

        return 'Vui lòng kiểm tra email của bạn';
    }

    public function showFormUser(){
        return view('admin.auth.user');
    }

    public function getPass(User $user, $token)
    {
        if ($user->token === $token) {
            return view('admin.auth.getPass');
        }
        return abort(404);
    }

    public function postGetPass(User $user, $token, Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm-password' => 'required',
        ],[
            'password.required' => 'Bạn cần nhập mật khẩu',
            'confirm-password.required' => 'Bạn cần nhập lại mật khẩu '
        ]);
        $password_h = bcrypt($request->password);
        $user->update(['password' => $password_h, 'token' => null]);

        return 'Đổi Mật Khẩu Thành công';
    }
}
