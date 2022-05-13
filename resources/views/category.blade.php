@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
      <div class="w-8/12 bg-white p-6 rounded-lg">
        <h2 class="text-center text-lg mb-4">Category</h2> 
        <form action="{{ route('category') }}" method="POST">
          <div>
            <label for="name" class="sr-only">Category name</label>
            <input type="text" name="name" id="name" placeholder="Choose category name" class="bg-gray-100 border-2 w-full p-4 mb-4 rounded-lg">
          </div>
          <button type="submit" class="bg-blue-500 text-white w-full p-4 rounded">Add category</button>
        </form>
      </div>
    </div>
@endsection