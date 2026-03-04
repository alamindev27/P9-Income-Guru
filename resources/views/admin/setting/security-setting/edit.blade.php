@extends('admin.layouts.app')
@section('head')
    <title>Admin Profile</title>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">

            @include('admin.layouts.partials.components.admin-cards')

            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <ul class="nav nav-pills custom-pills">
                        @include('admin.layouts.partials.components.profile-nav')
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="{{ route('admin.setting.security.update') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Current Password <small class="text-danger">*</small></label>
                                        <div class="col-md-12">
                                            <input type="password" placeholder="Current Password"
                                                class="form-control form-control-line @error('current_password') is-invalid @enderror"
                                                name="current_password">
                                            @error('current_password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                            @if (session('current_password'))
                                                <small class="text-danger">{{ session('current_password') }}</small>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">New Password <small class="text-danger">*</small></label>
                                        <div class="col-md-12">
                                            <input type="password" placeholder="New Password"
                                                class="form-control form-control-line @error('new_password') is-invalid @enderror"
                                                name="new_password">
                                            @error('new_password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Confirm New Password <small class="text-danger">*</small></label>
                                        <div class="col-md-12">
                                            <input type="password" placeholder="Confirm New Password"
                                                class="form-control form-control-line @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation">
                                            @error('password_confirmation')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Save & Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection
