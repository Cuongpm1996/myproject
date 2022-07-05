<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'short_content' => 'required|unique:posts',
            'content' => 'required',
        ],[
            'title.required' => 'Bạn cần nhập tiêu đề',
            'short_content.required' => 'Bạn cần nhập nội dung ngắn',
            'content.required' => 'Bạn cần nhập nội dung',
            'title.unique' => 'Tiêu đề đã tồn tại',
            'short_content.unique' => 'Nội dung ngắn đã tồn tại',
            'content.unique' => 'Nội dung đã tồn tại',
            'title.max' => 'Tiêu đề không được quá 255 ký tự',
        ]);

         $request->all();
        if ($request->has('file_update')) {
            $file = $request->file_update;
            $ext = $request->file_update->extension();
            $file_name = time().'-'.'product.'.$ext;
//            dd($file_name);
            $file->move(public_path('update'), $file_name);
        }
        $request->merge(['image' => $file_name]);
        $data = $request->all();

        Post::create($data);

        return redirect()->route('admin.posts.index');
    }

    public function edit()
    {

    }


    public function update()
    {

    }

    public function destroy()
    {

    }
}
