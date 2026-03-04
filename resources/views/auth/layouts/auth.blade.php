<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset(setting()->favicon) }}">
    <title>
        @if (Request::url() == route('login'))
            LOGIN
        @elseif(Request::url() == route('password.request'))
            FORGOT PASSWORD
        @elseif(Request::url() == route('register'))
            REGISTER
        @else
            UPDATE PASSWORD
        @endif - {{ setting()->site_name }}

    </title>
    <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet">

</head>

<body>

    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
        style="background:url({{ asset('backend') }}/assets/images/big/auth-bg.jpg) no-repeat center center;">
        <div class="auth-box">
            <div id="loginform">
                <div class="logo">
                    <span class="db mb-2">
                        <img src="{{ asset(setting()->logo) }}" alt="{{ setting()->site_name }}" />
                    </span>
                    <h5 class="font-medium my-2">
                        @if (Request::url() == route('login'))
                            LOGIN TO YOUR ACCOUNT
                        @elseif(Request::url() == route('password.request'))
                            <span class="d-block mb-2">FORGOT PASSWORD</span>
                            <a href="{{ route('login') }}" class="btn btn-sm btn-primary"> &laquo; Back to Login</a>
                        @elseif(Request::url() == route('register'))
                            REGISTER A NEW ACCOUNT
                        @else
                            UPDATE PASSWORD
                        @endif
                    </h5>
                </div>

                <div class="row">
                    <div class="col-12">
                        @yield('form')
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>

</html>
