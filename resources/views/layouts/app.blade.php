<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'SMKN 4 Bogor')</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="{{ asset('css/effects.css') }}">
</head>
<body class="bg-white">

  @include('partials.navbar')

  @yield('content')

  @include('partials.footer')

  <script src="{{ asset('js/effects.js') }}"></script>
</body>
</html>