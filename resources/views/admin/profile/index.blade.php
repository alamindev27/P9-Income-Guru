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
                                <form class="form-horizontal form-material" action="{{ route('admin.profile.update') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name <small class="text-danger">*</small></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Name"
                                                class="form-control form-control-line @error('name') is-invalid @enderror"
                                                value="{{ old('name') ?? auth()->user()->name }}" name="name">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Email <small
                                                class="text-danger">*</small></label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="E-mail"
                                                class="form-control form-control-line @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') ?? auth()->user()->email }}">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Avatar</label>
                                        <div class="col-md-12">
                                            <input type="file"
                                                class="form-control form-control-line @error('avatar') is-invalid @enderror"
                                                onchange="document.querySelector('.avatar-image').src = window.URL.createObjectURL(this.files[0])"
                                                name="avatar">
                                            @error('avatar')
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
