@extends('main')

@section('content')
<div>
  <header>
    <img src="{{ $blog->banner }}" style="max-width: 400px;"/>
    <h1>{{ $blog->title }}</h1>
  </header>
  <article>
    <p>{{ $blog->content }}</p>
  </article>
</div>
@endsection()