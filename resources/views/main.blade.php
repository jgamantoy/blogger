<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <title>blogger</title>
      <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
      <!-- <link href="/css/app.css" rel="stylesheet" /> -->
      @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
      @endif
  </head>
  <body>
  <nav class="navbar bg-gray-800 px-5 text-gray-400 h-[35px] flex items-center">
  <a
      href="#"
      class=""
  >
      Log in
  </a>
  </nav>
      <div class="content flex items-center">
        @yield('content')
      </div>
  </body>
</html>