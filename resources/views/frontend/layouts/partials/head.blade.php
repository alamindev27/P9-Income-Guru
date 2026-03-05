<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="icon" href="{{ asset(setting()->favicon) }}" type="image/png">
    <title>{{ setting()->site_name }}</title>
    @yield('head')
</head>
