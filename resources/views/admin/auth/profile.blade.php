@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="alert alert-success">
            @if(session('success'))
                {{ session('success') }}
            @endif
        </div>
        <div class="row">
            <div class="col-md-12 d-flex flex-column mt-4 mt-md-0">
                <div class="card flex-grow-1 mb-0">
                    <div class="card-body">
                        <div>
                            <H2> THÔNG TIN TÀI KHOẢN</H2>
                            <p>Email: {{auth()->user()->email}}</p>
                            <p>Tên: {{auth()->user()->name}}</p>
                        </div>
                        <form action="{{route('profile')}}" method="post" style="text-align: center">
                            @csrf
                            @method('put')
                            <i style="color: blue">Bạn có thể thay đổi tài khoản của mình tại đây</i>
                            <div class="form-group">
                                <input type="text" name="email" value="{{auth()->user()->email}}" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" value="{{auth()->user()->name}}" placeholder="name">
                            </div>
                            <i style="color: blue">Vui lòng tích vào để thay đổi cả mật khẩu</i>
                            <div class="form-group">
                                <input type="checkbox" name="change_password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="password">
                            </div>
                            <div class="form-group">
                                <a href="{{route('logout')}}">Đăng Xuất</a>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Cập Nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
