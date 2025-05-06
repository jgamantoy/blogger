@extends('main')
<?php
  $user = auth()->user();
?>
@section('content')
<div class="Home">
  <div class="Home__header">
    <h1>Hello {{ $user->name }}!</h1>
  </div>
  @if (count($user->blogs) > 0)
    <span>Here are your blogs</span></br>
    @foreach($user->blogs as $blog)
      <div class="mb-3 flex items-center">
        <span class="mr-2">{{ $blog->title }}</span>
        @if(!$blog->publish)
          <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">draft</span>
        @endif
        <form action="{{ route('blog.delete', $blog->id) }}" method="POST">
          @csrf
          @method('delete')
          <button class="mr-2 hover:bg-red-500 hover:text-white hover:border-red-500 text-red-300 border-1 border-solid border-red-300 font-bold py-1 px-4 rounded-full" onclick="event.preventDefault(); this.closest('form').submit();">Delete</button>
        </form>
        <a class="mr-2 hover:bg-blue-500 hover:text-white hover:border-blue-500 text-blue-300 border-1 border-solid border-blue-300 font-bold py-1 px-4 rounded-full" href="/blog/{{ $blog->id }}">View</a>
        <a class="mr-2 hover:bg-blue-500 hover:text-white hover:border-blue-500 text-blue-300 border-1 border-solid border-blue-300 font-bold py-1 px-4 rounded-full" href="/blog/edit/{{ $blog->id }}">Edit</a>
      </div>
    @endforeach
  @else
      <p>It looks like you don't have any blogs...</p>
  @endif
  </br>

  <a href="{{ route('create') }}">New</a>
</div>
@endsection()