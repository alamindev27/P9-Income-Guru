@extends('admin.layouts.app')
@section('head')
    <title>Banner</title>
    <style>
        #zero_config td,
        #zero_config th {
            vertical-align: middle;
            text-align: center;
        }
    </style>
    {{-- <link href="{{ asset('backend/assets') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet"> --}}
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Banner</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Banner</h4>

                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Heading 1</th>
                                        <th>Heading 2</th>
                                        {{-- <th>Short Description</th> --}}
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>{{ $data->heading_1 }}</b></td>
                                        <td><b>{{ $data->heading_2 }}</b></td>
                                        {{-- <td>{{ $data->short_description }}</td> --}}
                                        <td>
                                            <img src="{{ asset($data->image) }}" alt="{{ $data->heading_1.' '.$data->heading_2 }}" width="80"
                                                height="40">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.banners.edit', $data->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>

                                        </td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('scripts')
    {{-- <script src="{{ asset('backend/assets') }}/extra-libs/DataTables/datatables.min.js"></script>
    <script src="{{ asset('backend/dist') }}/js/pages/datatable/datatable-basic.init.js"></script> --}}
@endsection
