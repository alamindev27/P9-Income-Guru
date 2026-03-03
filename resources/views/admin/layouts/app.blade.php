<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset(setting()->favicon) }}">
    @include('admin.layouts.partials.components.styles')
</head>

<body>
    <form action="{{ route('logout') }}" method="POST" id="logout-form">
        @csrf
    </form>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        @include('admin.layouts.partials.header')
        @include('admin.layouts.partials.sidebar')
        <div class="page-wrapper">
            @yield('content')
            @include('admin.layouts.partials.footer')
        </div>
    </div>
    <div class="chat-windows"></div>
    @include('admin.layouts.partials.components.scripts')
    @include('admin.layouts.partials.components.message')
</body>

</html>
