<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'Default Title')</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> --}}
      @vite(['resources/scss/app.scss'])
    @stack('styles')
    <!-- Add this in the <head> section -->
<!-- Add this in the <head> section -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT4zbbVYUew+OrCXaRkfj" crossorigin="anonymous">

    <!-- Optionally include Bootstrap Icons (for user/profile icons) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


</head>
<body>

    @yield('content')

</body>
</html>

