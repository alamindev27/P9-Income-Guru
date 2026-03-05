<!doctype html>
<html lang="en">
@include('frontend.layouts.partials.head')

<body>
    @include('frontend.layouts.partials.top-bar')
    @yield('content')
    @include('frontend.layouts.partials.footer')
</body>

</html>
