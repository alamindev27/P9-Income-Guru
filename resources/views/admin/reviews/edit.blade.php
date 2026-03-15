@extends('admin.layouts.app')
@section('head')
    <title>Edit Review</title>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit Review</h4>
            </div>
            <div class="col-7 text-right">
                <a href="{{ route('admin.reviews.index') }}" class="btn btn-primary btn-sm"> &laquo; Back Reviews
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Review</h4>
                        <form action="{{ route('admin.reviews.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="description">Description <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" placeholder="Review Description" name="description" required id="description" value="{{ old('description') ?? $data->description }}">
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="image">Image  <small class="text-danger">*</small></label>
                                    <input type="file" class="form-control" name="image" required id="image">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <img src="{{ asset($data->image) }}" alt="" width="120" height="80">
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Save & Update</button>
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
