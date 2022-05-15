<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index', [
            'categories' => $categories,
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        // dd($request); 
        $this->validate($request, [
            'title' => 'required|max:255',
            'category' => 'required',
            'body' => 'required'
        ]);

        $post=new Post;
        $post->title=$request->title;
        $post->user_id = auth()->id();
        $post->body=$request->body;
        $post->category_id = $request->category;
        $post->save();

        return back()->with(['posts' => Post::get()]);
    }

    public function show(Post $post)
    {
        $author = User::find($post->user_id)->name;
        return view('posts.show', [
            'post' => $post,
            'author' => $author,
        ]);
    }

    public function edit(Post $post)
    {
        $categories = Category::get();
        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $data = $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        $post->update($data);
        return redirect()->route('posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}
