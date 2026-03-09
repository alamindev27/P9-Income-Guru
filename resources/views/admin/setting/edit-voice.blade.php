@extends('admin.layouts.app')
@section('head')
    <title>Voice Edit</title>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Voice</h4>
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
                                    action="{{ route('admin.voice.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Voice <small class="text-danger">*</small></label>
                                        <div class="col-md-12">
                                            <input type="file" class="form-control form-control-line" name="voice">
                                            @error('voice')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            @if (isset(setting()->voice) && file_exists(public_path(setting()->voice)))
                                                <div class="mt-2">
                                                    <audio controls>
                                                        <source src="{{ asset(setting()->voice) }}"
                                                            type="audio/mpeg">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                </div>
                                            @endif
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
