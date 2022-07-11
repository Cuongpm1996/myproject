@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="card">
            <div class="alert alert-success">
                @if(session('success'))
                    {{ session('success') }}
                @endif
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tiêu Đề</th>
                        <th>Nội Dung Ngắn</th>
                        <th>Ảnh</th>
                        <th>Hành Động</th>
                    </tr>
                    </thead>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td width="300px">{{ $post->title }}</td>
                            <td width="400px">{{ $post->short_content }}</td>
                            <td style="text-align: center"><img src=/update/{{$post->image}} style="width:50px;height:50px"></td>

                            <td style="text-align: center">
                                <a class="btn btn-info btn-sm" href="/admin/posts/{{ $post->id }}/untrash">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Khôi Phục
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <br>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
