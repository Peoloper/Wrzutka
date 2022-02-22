<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>

    @include('layouts.admin_partials.css')
    @include('layouts.admin_partials.script')
    @include('layouts.admin_partials.dataTables')


</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <nav id="app" class="main-header navbar navbar-expand navbar-white navbar-light">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars"></i>
        </a>
    </nav>

   @include('layouts.admin_partials.sidebar')

    <div class="content-wrapper">
        @yield('content')
    </div>

    @include('layouts.admin_partials.footer')
</div>

@include('sweetalert::alert')

</body>
</html>
