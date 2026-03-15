@extends('admin.layouts.app')
@section('head')
    <title>Edit Social</title>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit Social</h4>
            </div>
            <div class="col-7 text-right">
                <a href="{{ route('admin.socials.index') }}" class="btn btn-primary btn-sm"> &laquo; Back Socials
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit <b class="text-danger">{{ $data->name }}</b> Info</h4>
                        <form action="{{ route('admin.socials.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                
                                <div class="form-group col-lg-12">
                                    <label for="link">{{ $data->name }} Link <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" placeholder="Link" name="link"
                                        required id="link" value="{{ old('link', $data->link) }}">
                                    @error('link')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                


                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Save & Update Social</button>
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
