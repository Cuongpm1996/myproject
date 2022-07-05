<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::first()->simplePaginate(3);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255|email',
            'password' => 'required|min:6',

        ],[
            'name.required' => 'Bạn cần nhập tên tài khoản',
            'email.required' => 'Bạn cần nhập email',
            'password.required' => 'Bạn cần nhập mật khẩu',
            'name.unique' => 'Tên tài khoản đã tồn tại',
            'email.unique' => 'Email đã tồn tại',
            'name.max' => 'Tên tối đa 255 ký tự',
            'email.max' => 'Email tối đa 255 ký tự',
            'password.min' => 'Mật Khẩu tối thiếu có 6 ký tự',
            'email.email' => 'Bạn phải nhập địa chỉ email hợp lệ',
        ]);

        $data = $request->all();
        User::create($data);

        return redirect()->route('admin.users.index')->with('success','Thêm tài khoản thành công !');
    }

    public function edit(Request $request)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
