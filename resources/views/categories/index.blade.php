@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center">
      <div class="lg:w-2/12 bg-white p-6 rounded-lg">
        <h2 class="text-center text-lg mb-4">Category</h2> 
        <form action="{{ route('category') }}" method="POST" class="mb-4">
          @csrf
          <div>
            <label for="name" class="sr-only">Category name</label>
            <input type="text" name="name" id="name" placeholder="Choose category name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror">

            @error('name')
              <div class="text-red-500 text-sm mt-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <button type="submit" class="bg-blue-500 text-white w-full mt-4 p-4 rounded">Add category</button>
        </form>
      </div>

      @if ($categories->count())
        <div class="mt-6 bg-white md:w-8/12">
          <table class="table-auto w-full text-center border-2">
              <thead class="border-2 bg-gray-800 text-white">
                <tr>
                  <th class="p-4">Name</th>
                  <th class="p-4">Created by</th>
                  <th class="p-4">Created</th>
                  <th class="p-4">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($categories as $category)
                  <tr>
                    <td class="text-gray-900 font-light p-4">{{ $category->name }}</td>
                    <td class="text-gray-900 font-light p-4">{{ $category->user->name }}</td>
                    <td class="text-gray-900 font-light p-4">{{ $category->created_at->diffForHumans() }}</td>
                    <td class="text-gray-900 font-light p-4">
                      @if ($category->ownedBy(auth()->user()))
                      <div class="flex space-x-4 justify-center">
                        <a href="/category/{{ $category->id }}/edit" class="inline bg-blue-500 px-2 py-1 text-white text-sm rounded">Edit</a>
                        <form action="/category/{{ $category->id }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="inline bg-red-400 px-2 py-1 text-sm rounded">Delete</button>
                        </form>
                      </div>                          
                      @endif
                    </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <div class="mt-4 p-4 bg-white rounded-lg md:w-8/12">
          {{ $categories->links() }}
        </div>
      @else
        <p>There are no categories.</p>
      @endif
    </div>
@endsection