@extends('admin.layouts.app')
@section('head')
    <title>Proofs</title>
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
                <h4 class="page-title">Proofs</h4>
            </div>
            <div class="col-7 text-right">
                <a href="{{ route('admin.proof.create') }}" class="btn btn-primary btn-sm">Create Proof &raquo;</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Proofs</h4>

                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $item)
                                        <tr>
                                            <td>{{ ++$loop->index }}</td>
                                            <td><b>{{ $item->time }}</b></td>
                                            <td>
                                                @if ($item->status == 'WIN')
                                                    <span class="badge badge-success">WIN</span>
                                                @elseif ($item->status == 'LOSS')
                                                    <span class="badge badge-danger">LOSS</span>
                                                @else
                                                    <span class="badge badge-warning">DRAW</span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.proof.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('admin.proof.destroy', $item->id) }}" method="POST" style="display:inline;">
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
