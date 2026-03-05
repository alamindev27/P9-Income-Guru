@extends('admin.layouts.app')
@section('head')
    <title>Edit Video</title>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit Video</h4>
            </div>
            <div class="col-7 text-right">
                <a href="{{ route('admin.videos.index') }}" class="btn btn-primary btn-sm"> &laquo; Back Videos
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Video</h4>
                        <form action="{{ route('admin.videos.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="title">Title <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control" placeholder="Video Title" name="title" required id="title" value="{{ old('title') ?? $data->title }}">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group ">
                                        <label for="description">Description <small class="text-danger">*</small></label>
                                        <textarea name="description" id="description" rows="18" class="form-control" required placeholder="your description here">{{ old('description') ?? $data->description }}</textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="thumbnail">Thumbnail <small>(1280x720px)</small> <small class="text-danger">*</small></label>
                                        <input type="file" class="form-control" name="thumbnail" id="thumbnail" accept="image/*">
                                        @error('thumbnail')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <div class="d-block mt-3">
                                            <img src="{{ asset($data->thumbnail) }}" alt="" width="150" height="70">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="video">Video <small class="text-danger">*</small></label>
                                        <input type="file" class="form-control" name="video" id="video" accept="video/*">
                                        @error('video')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <div class="d-block mt-3">
                                            <video width="320" height="200" controls>
                                                <source src="{{ asset($data->video) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Save & Update Video</button>
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
