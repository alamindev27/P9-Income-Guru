@extends('admin.layouts.app')
@section('head')
    <title>Edit Intro</title>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit Banner</h4>
            </div>
            <div class="col-7 text-right">
                <a href="{{ route('admin.intro.index') }}" class="btn btn-primary btn-sm"> &laquo; Back Intro
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row justify-content-center">

 @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Intro</h4>
                        <form action="{{ route('admin.intro.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="animated_text">Animated Text <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" placeholder="Animated Text" name="animated_text"
                                        required id="animated_text" value="{{ old('animated_text', $data->animated_text) }}">
                                    @error('animated_text')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="heading_1">Heading 1 <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" placeholder="Heading 1" name="heading_1"
                                        required id="heading_1" value="{{ old('heading_1', $data->heading_1) }}">
                                    @error('heading_1')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="heading_2">Heading 2 <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" placeholder="Heading 2" name="heading_2"
                                        required id="heading_2" value="{{ old('heading_2', $data->heading_2) }}">
                                    @error('heading_2')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="winning_link">Winning Link <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" placeholder="Winning Link" name="winning_link"
                                        required id="winning_link" value="{{ old('winning_link', $data->winning_link) }}">
                                    @error('winning_link')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="image">Image </label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="form-group col-lg-6">
                                    <label for="">Image View</label> <br>
                                    <img src="{{ asset($data->image) }}" alt="" width="80" height="40">
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Save & Update Intro</button>
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
