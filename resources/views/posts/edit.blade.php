@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center">
      <div class="w-4/12 bg-white p-6 rounded-lg">
        <h2 class="text-lg text-center mb-4">Edit Post</h2>
        <form action="/posts/{{$post->id}}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-4">
            <label for="title" class="sr-only">Post title</label>
            <input type="text" name="title" id="title" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror" placeholder="Title" value="{{ $post->title }}">

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
            <textarea name="body" class="w-full border-2 resize-y rounded-md @error('title') border-red-500 @enderror" placeholder="Post description">{{ $post->body }}</textarea>
            @error('body')
              <div class="text-red-500 text-sm mt-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <button type="submit" class="bg-green-400 p-4 w-full rounded-lg">Submit Change</button>
        </form>
      </div>
    </div>

@endsection