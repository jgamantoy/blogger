@extends('main')
@section('content')
<div class="register">
  <h1>Login</h1>
  <form action="{{ route('user.authenticate') }}" method="post">
    @csrf
    <div class="mb-5">
      <label for="email">Email:</label><br>
      <input type="text" id="email" name="email"><br>
    </div>
    <div class="mb-5">
      <label for="password">Password:</label><br>
      <input type="text" id="password" name="password"><br>
    </div>
    <div class="flex items-center justify-center">
      <button class="text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Submit
      </button>
    </div>
    
  </form>
</div>
@endsection