@extends('admin.layouts.app')
@section('head')
    <title>Create Proof</title>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Create Proof</h4>
            </div>
            <div class="col-7 text-right">
                <a href="{{ route('admin.proof.index') }}" class="btn btn-primary btn-sm"> &laquo; Back Proofs
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
                        <h4 class="card-title">Create Proof</h4>
                        <form action="{{ route('admin.proof.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="time">Time <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" placeholder="Today/Yeasterday/2 days ago...." name="time" required id="time" value="{{ old('time') }}">
                                    @error('time')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="status">Status <small class="text-danger">*</small></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="WIN" {{ old('status') == 'WIN' ? 'selected' : '' }}>WIN</option>
                                        <option value="LOSS" {{ old('status') == 'LOSS' ? 'selected' : '' }}>LOSS</option>
                                        <option value="DRAW" {{ old('status') == 'DRAW' ? 'selected' : '' }}>DRAW</option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Save & Create Proof</button>
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
