@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center">
  <div class="lg:w-2/12 bg-white p-6 rounded-lg">
    <h2 class="text-center text-lg mb-4">Edit Category Name</h2> 
    <form action="/category/{{$category->id}}" method="POST" class="mb-4">
      @csrf
      @method('PUT')
      <div>
        <label for="name" class="sr-only">Category name</label>
        <input type="text" name="name" id="name" placeholder="Choose category name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ $category->name }}">
        @error('name')
          <div class="text-red-500 text-sm mt-2">
            {{ $message }}
          </div>
        @enderror
      </div>
      <button type="submit" class="bg-blue-500 text-white w-full mt-4 p-4 rounded">Update category</button>
    </form>
  </div>
@endsection