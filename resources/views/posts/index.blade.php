@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center">
      <div class="w-4/12 bg-white p-6 rounded-lg">
        <h2 class="text-lg text-center mb-4">Post</h2>
        <form action="{{ route('posts') }}" method="POST">
          @csrf
          <div class="mb-4">
            <label for="title" class="sr-only">Post title</label>
            <input type="text" name="title" id="title" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror" placeholder="Title" value="{{ old('title') }}">

            @error('title')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-4">
            <label for="category" class="sr-only">Category</label>
            <select name="category" id="category" class="bg-gray-100 border-2 rounded-lg @error('title') border-red-500 @enderror">
              <option value="" disabled selected>Select your category</option>
              @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>

            @error('category')
              <div class="text-red-500 text-sm mt-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-4">
            <textarea name="body" class="w-full border-2 resize-y rounded-md @error('title') border-red-500 @enderror" placeholder="Post description">{{ old('body') }}</textarea>
            @error('body')
              <div class="text-red-500 text-sm mt-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <button type="submit" class="bg-green-400 p-4 w-full rounded-lg">Upload post</button>
        </form>
        @foreach ($posts as $post)
            <div class="mt-4 p-4">
              <a href="/posts/{{$post->id}}" class="text-xl hover:text-blue-600">{{ $post->title }} <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span></a>
              <p class="text-slate-500">{{ $post->body }}</p>
            </div>

            @if($post->ownedBy(auth()->user()))
            <div class="p-4">
              <a href="/posts/{{$post->id}}/edit" class="bg-blue-500 px-2 py-1 text-white text-sm rounded">edit</a>
              <form action="/posts/{{$post->id}}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-400 px-2 py-1 text-sm rounded">delete</button>
              </form>
            </div>
            @endif
        @endforeach
        {{ $posts->links() }}
      </div>
      </div>

@endsection
