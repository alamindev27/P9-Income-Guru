@extends('admin.layouts.app')
@section('head')
    <title>Create Video</title>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Create Video</h4>
            </div>
            <div class="col-7 text-right">
                <a href="{{ route('admin.videos.index') }}" class="btn btn-primary btn-sm"> &laquo; Back Videos
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Video</h4>
                        <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="title">Title <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" placeholder="Video Title" name="title" required id="title" value="{{ old('title') }}">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="description">Description <small class="text-danger">*</small></label>
                                    <textarea name="description" id="description" rows="5" class="form-control" required placeholder="your description here">{{ old('description') }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="thumbnail">Thumbnail <small>(1280x720px)</small> <small class="text-danger">*</small></label>
                                    <input type="file" class="form-control" name="thumbnail" required id="thumbnail" accept="image/*">
                                    @error('thumbnail')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="video">Video <small class="text-danger">*</small></label>
                                    <input type="file" class="form-control" name="video" required id="video" accept="video/*">
                                    @error('video')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Save & Create Video</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('footer')
@endsection
