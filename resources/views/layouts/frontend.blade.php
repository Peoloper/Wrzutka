<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wrzutka</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    @include('layouts.partials.css')
    @include('layouts.partials.script')

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    @include('layouts.partials.navbar')
</nav>

@yield('content')

<footer id="footer" class="text-light bg-dark mt-3">
    @include('layouts.partials.footer')
</footer>
@include('sweetalert::alert')
</body>
</html>
