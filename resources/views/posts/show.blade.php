@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-4/12 bg-white p-6 rounded-lg">
    <div class="mt-4 p-4">
      <a href="#detail" class="text-xl hover:text-blue-600">{{ $post->title }} <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span></a>
      <p class="text-sm text-slate-500">Posted by: {{ $author }}</p>
      <p class="text-slate-500 text-lg mt-2">{{ $post->body }}</p>
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
  </div>
</div>
@endsection