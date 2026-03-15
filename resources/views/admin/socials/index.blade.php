@extends('admin.layouts.app')
@section('head')
    <title>Socials</title>
    <style>
        #zero_config td,
        #zero_config th {
            vertical-align: middle;
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Socials</h4>
            </div>

        </div>
    </div>

    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Socials</h4>

                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex justify-content-start align-items-center">
                                                    {!! $item->icon !!}
                                                    <b class="ml-3">{{ $item->name }}</b>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ $item->link }}" target="_blank">Click Here</a>
                                            </td>
                                            
                                            <td>
                                                <a href="{{ route('admin.socials.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No socials available</td>
                                        </tr>
                                    @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('scripts')
@endsection
