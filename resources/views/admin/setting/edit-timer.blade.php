@extends('admin.layouts.app')
@section('head')
    <title>Timer Edit</title>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Timer</h4>
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
                                    action="{{ route('admin.timer.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Hours <small class="text-danger">*</small></label>
                                        <div class="col-md-12">
                                            <input type="number" class="form-control form-control-line" name="hours" value="{{ old('hours', setting()->timer['hours']) }}" min="0">
                                            @error('hours')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Minutes <small class="text-danger">*</small></label>
                                        <div class="col-md-12">
                                            <input type="number" class="form-control form-control-line" name="minutes" value="{{ old('minutes', setting()->timer['minutes']) }}" min="0">
                                            @error('minutes')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Seconds <small class="text-danger">*</small></label>
                                        <div class="col-md-12">
                                            <input type="number" class="form-control form-control-line" name="seconds" value="{{ old('seconds', setting()->timer['seconds']) }}" min="0">
                                            @error('seconds')
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
