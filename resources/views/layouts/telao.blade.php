<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/script.js') }}" defer></script>
  <script src="{{ asset('js/mesa.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/telao.css') }}" rel="stylesheet">
  <link href="{{ asset('css/mesa.css') }}" rel="stylesheet">
</head>

<body onload="teste(); time(); data()">
  <div id="app">
    <main class="py-4">
      @yield('content')
    </main>
  </div>
  @stack('myjs')
</body>

</html>