@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-default-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('admin.users.update', ['id' => $user->id]) }}">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa</h3>
                        </div>
                        <div class="card-body">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="form-group" style="display: flex">
                                <div class="col-3">
                                    <label for="name">Tên (<span class="fa fa-star"
                                                                 style="font-size:10px;color:red"></span>):</label>
                                    <input class="form-control" type="text" name="name" required="" value="{{$user->name}}">
                                </div>
                                <div class="col-3">
                                    <label for="email">Email (<span class="fa fa-star"
                                                                    style="font-size:10px;color:red"></span>):</label>
                                    <input class="form-control" type="text" name="email" required="" value="{{$user->email}}">
                                </div>
                                <div class="col-3">
                                    <label for="">Loại Tài Khoản:</label>
                                    <div class="form-control">
                                        <label>
                                            <input type="radio" name="is_admin" value="1" checked="checked">
                                            Admin
                                        </label>
                                        <label>
                                            <input type="radio" name="is_admin" value="0" checked="checked">
                                            User
                                        </label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="">Trạng Thái:</label>
                                    <div class="form-control">
                                        <label>
                                            <input type="radio" name="status" value="1" checked="checked">
                                            Kích Hoạt
                                        </label>
                                        <label>
                                            <input type="radio" name="status" value="0" checked="checked">
                                            Chưa Kích Hoạt
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
