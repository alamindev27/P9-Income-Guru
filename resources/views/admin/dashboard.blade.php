@extends('admin.layouts.app')
@section('head')
    <title>Admin Dashboard</title>
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row">

            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Total Promos</h5>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6>{{ $totalPromos < 9 ? '0' . $totalPromos : $totalPromos }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Total Videos</h5>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6>{{ $totalVideos < 9 ? '0' . $totalVideos : $totalVideos }}</h6>
                                    </div>
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
