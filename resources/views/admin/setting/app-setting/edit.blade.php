@extends('admin.layouts.app')
@section('head')
    <title>App Setting</title>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Setting</h4>
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
                                <form class="form-horizontal form-material" action="{{ route('admin.setting.update') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Author Name <small class="text-danger">*</small></label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Author Name" class="form-control form-control-line @error('author_name') is-invalid @enderror" value="{{ old('author_name') ?? setting()->author_name }}" name="author_name">
                                            @error('author_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="col-md-12">Logo</label>
                                            <div class="col-md-12">
                                                <input type="file"
                                                    class="form-control form-control-line @error('logo') is-invalid @enderror"
                                                    onchange="document.querySelector('.logo-image').src = window.URL.createObjectURL(this.files[0])"
                                                    name="logo">
                                                @error('logo')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="text-center">
                                                    <img src="{{ asset(setting()->logo) }}" alt="Logo" class="border rounded mt-3 logo-image" style="width: 150px; height:40px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="col-md-12">Favicon</label>
                                            <div class="col-md-12">
                                                <input type="file"
                                                    class="form-control form-control-line @error('favicon') is-invalid @enderror"
                                                    onchange="document.querySelector('.favicon-image').src = window.URL.createObjectURL(this.files[0])"
                                                    name="favicon">
                                                @error('favicon')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="text-center">
                                                    <img src="{{ asset(setting()->favicon) }}" alt="favicon" class="border rounded mt-3 favicon-image" style="width: 45px; height:45px;">
                                                </div>
                                            </div>
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
