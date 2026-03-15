@extends('admin.layouts.app')
@section('head')
    <title>Promos</title>
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
                <h4 class="page-title">Promos</h4>
            </div>
            <div class="col-7 text-right">
                <a href="{{ route('admin.promos.create') }}" class="btn btn-primary btn-sm">Create Promo &raquo;</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Promos</h4>

                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Promo Code</th>
                                        <th>Link</th>
                                        <th>Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $item)
                                        <tr>
                                            <td><b>{{ $item->name }}</b></td>
                                            <td>{{ $item->promo_code }}</td>
                                            <td>
                                                <a href="{{ $item->link }}" target="_blank">Click Here</a>
                                            </td>
                                            <td>
                                                <img src="{{ asset($item->icon) }}" alt="{{ $item->name }}" width="50"
                                                    height="50" class="rounded-circle border p-1">
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.promos.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('admin.promos.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No promos available</td>
                                        </tr>
                                    @endforelse
                            </table>
                            {{ $datas->withQueryString()->links() }}
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
