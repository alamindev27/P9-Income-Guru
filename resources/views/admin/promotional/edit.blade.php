@extends('admin.layouts.app')
@section('head')
    <title>Promotional Edit</title>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Promotional</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                            <div class="card-body">
                                <form class="form-horizontal form-material"
                                    action="{{ route('admin.promotional.update', $data->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="col-md-12">Heading Top <small class="text-danger">*</small></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" placeholder="Enter heading top" value="{{ old('heading_top') ?? $data->heading_top }}" name="heading_top">
                                            @error('heading_top')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Heading Bottom <small class="text-danger">*</small></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" placeholder="Enter heading bottom" value="{{ old('heading_bottom') ?? $data->heading_bottom }}" name="heading_bottom">
                                            @error('heading_bottom')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Animated Text <small class="text-danger">*</small></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" placeholder="Enter animated text" value="{{ old('animated_text') ?? $data->animated_text }}" name="animated_text">
                                            @error('animated_text')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Banner <small>(708*310px)</small> <small class="text-danger">*</small></label>
                                        <div class="col-md-12">
                                            <input type="file" class="form-control form-control-line" name="banner">
                                            @error('banner')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <img src="{{ asset($data->banner) }}" alt="" width="200" height="90" class="rounded border">
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
