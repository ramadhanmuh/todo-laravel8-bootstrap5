<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('description')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <x-favicon/>
    <link rel="stylesheet" href="{{ url('libraries/bootstrap-5.3.0-dist/css/bootstrap.min.css') }}">
    <title>{{ $application->name }} - @yield('title')</title>
</head>
<body class="bg-white row m-0 min-vh-100 justify-content-center">
    <div class="col-12 p-0">
        <x-user.navbar :navbarActive="$navbarActive" />
    </div>
    <div class="col">
        <div class="row justify-content-center">
            @yield('content')
        </div>
    </div>
    <div class="col-12 p-5 py-3 align-self-end bg-white border">
        <span>
            {{ $application->copyright }}
        </span>
    </div>
    <x-script/>
</body>
</html>