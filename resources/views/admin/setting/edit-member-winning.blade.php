@extends('admin.layouts.app')
@section('head')
    <title>Member & Winning Edit</title>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Member & Winning</h4>
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
                                    action="{{ route('admin.member.Winning.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Total Members <small class="text-danger">*</small></label>
                                        <div class="col-md-12">
                                            <input type="number" class="form-control form-control-line" name="total_members" value="{{ old('total_members', setting()->total_members) }}" min="0">
                                            @error('total_members')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Total Winning Amount <small class="text-danger">*</small></label>
                                        <div class="col-md-12">
                                            <input type="number" class="form-control form-control-line" name="winning_amount" value="{{ old('winning_amount', setting()->total_won) }}" min="0" step="0.01">
                                            @error('winning_amount')
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
