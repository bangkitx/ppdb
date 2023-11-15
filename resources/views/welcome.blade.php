@extends('layouts/main')

@section('container')
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
        <h6>Selamat datang, {{ $user->name }}</h6>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
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
                                Pengumuman Kelolosan</div>
                            <div class="h5 mb-2 font-weight-bold text-gray-800">
                                {{-- <input type="checkbox" data-toggle="toggle">
                                 --}}
                                <a href="/config" class="btn btn-primary">Atur</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Siswa & Siswi yang mendaftar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <h2>{{ $count }}</h2>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Siswa yang mendaftar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <h2>{{ $siswaLaki }}</h2>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-male fa-3x"></i>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Siswi yang mendaftar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <h2>{{ $siswiPerempuan }}</h2>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-female fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
