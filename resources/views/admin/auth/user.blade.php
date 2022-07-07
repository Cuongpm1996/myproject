@extends('admin.layout1')
@section('content')
    <div class="container">
        <div class="alert alert-success">
            @if(session('error'))
                {{ session('error') }}
            @endif
        </div>
        <div class="row">
            <div class="col-md-12 d-flex flex-column mt-4 mt-md-0">
                <div class="card flex-grow-1 mb-0">
                    <div class="card-body">
                            <h2>Bạn không thể đăng nhập vào hệ thống</h2>
                            <i>Lưu ý: Chỉ admin mới có quyền vào trang quản lý</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
