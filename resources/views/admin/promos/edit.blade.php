@extends('admin.layouts.app')
@section('head')
    <title>Edit Promo</title>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit Promo</h4>
            </div>
            <div class="col-7 text-right">
                <a href="{{ route('admin.promos.index') }}" class="btn btn-primary btn-sm"> &laquo; Back Promos
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Promo</h4>
                        <form action="{{ route('admin.promos.update', $promo->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="name">Name <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" placeholder="Promo Name" name="name"
                                        required id="name" value="{{ old('name', $promo->name) }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="promo_code">Promo Code <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" placeholder="Promo Code" name="promo_code"
                                        required id="promo_code" value="{{ old('promo_code', $promo->promo_code) }}">
                                    @error('promo_code')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="link">Promo Link <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" placeholder="Promo Link" name="link"
                                        required id="link" value="{{ old('link', $promo->link) }}">
                                    @error('link')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="icon">Icon <img src="{{ asset($promo->icon) }}" alt="" width="50" height="15"></label>
                                    <input type="file" class="form-control" name="icon" id="icon">
                                    @error('icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Save & Update Promo</button>
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
