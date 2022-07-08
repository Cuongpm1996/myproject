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
                        <form action="" method="post">
                            @csrf
                            <div class="form-group" >
                                <label class="col-3">Mật Khẩu</label>
                                <input type="password" name="password" placeholder="password" class="col-4">
                            </div>
                            <div class="form-group">
                                <label class="col-3">Nhập Lại Mật Khẩu</label>
                                <input type="password" name="confirm-password" placeholder="confirm-password" class="col-4">
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Đặt Lại Mật Khẩu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

