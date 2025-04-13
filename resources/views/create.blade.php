@extends('main')
<?php
  $titleValue = isset($blog) ? $blog->title : '';
  $contentValue = isset($blog) ? $blog->content : '';
  $route = isset($blog) ? route('blog.edit', $blog) : route('blog.store');
?>
@section('content')
<div>
  <form action="{{ $route }}" method="post">
    @csrf
    @if (isset($blog))
      @method('put')
    @else
      @method('post')
    @endif
    <label for="title">Title:</label>
    <input name="title" type="text" id="title" placeholder="Input title here" value="{{ $titleValue }}"/></br>
    <label for="content">Body:</label></br>
    <textarea name="content">{{ $contentValue }}</textarea></br>
    <input type="checkbox" name="publish" {!! $blog->publish ? 'checked' : '' !!}/>
    <label for="publish">Publish</label></br>
    <button>Submit</button>
  </form>
  @if ($errors->any())
    <p>There is an error</p>
  @endif
</div>
@endsection()