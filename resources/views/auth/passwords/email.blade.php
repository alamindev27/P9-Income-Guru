@extends('auth.layouts.auth')
@section('form')
    <form class="form-horizontal m-t-20" action="{{ route('password.email') }}" method="POST">
        @csrf
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="ti-email"></i></span>
                </div>
                <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror"
                    placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" name="email"
                    value="{{ old('email') }}" autocomplete="off" autofocus>
            </div>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group text-center">
            <div class="col-xs-12 p-b-20">
                <button class="btn btn-block btn-lg btn-info" type="submit">Send Password Reset Link</button>
            </div>
        </div>
    </form>
@endsection
