<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'SMKN 4 Bogor')</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">

  @yield('content')

</body>
</html>