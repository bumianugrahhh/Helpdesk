@extends('layouts.template')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pengaduan Terkirim</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$terkirim}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Dalam Antrian</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$antrian}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

						<!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Dalam Proses</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$proses}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas  fa-hourglass-half fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pengaduan Selesai</div>
                                            <div class="h5 mb-0 font-weight-bold text-warning-800">{{$selesai}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas  fa-check fa-2x text-warning-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Content Row -->
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Pengaduan Dibatalkan</div>
                                            <div class="h5 mb-0 font-weight-bold text-danger-800">{{$batal}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-reply fa-2x text-danger-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Content Row -->
</div>
@endsection