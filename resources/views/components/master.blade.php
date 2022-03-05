<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @stack('css')
</head>

<body>

    <main>
        {{-- @yield('content') --}}
        {{-- {{ $content }} --}}
        {{ $slot }}
    </main>

    @stack('js')
</body>

</html>
