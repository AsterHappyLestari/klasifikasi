@extends('master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-info">Selamat datang, Syarif. Anda adalah Admin</h4>
                    <p>Aplikasi ini merupakan aplikasi klasifikasi tingkat ekonomi menggunakan algoritma Naive Bayes.
                        Tujuan aplikasi ini untuk menentukan tingkat ekonomi dengan menghasilkan tiga kelompok yaitu
                        kurang mampu, menengah, dan mampu.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="widget-stat card bg-primary">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-folder"></i>
                        </span>
                        <div class="media-body text-white">
                            <p class="mb-1">Total Data Penduduk</p>
                            <h3 class="text-white">{{ $totalData }}</h3>
                            <div class="progress mb-2 bg-secondary">
                                <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                                                </div>
                            <small></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="widget-stat card bg-warning">
            <div class="card-body  p-4">
                <div class="media">
                    <span class="mr-3">
                        <i class="la la-users"></i>
                    </span>
                    <div class="media-body text-white">
                        <p class="mb-1">Data yang Belum Diklasifikasi</p>
                        <h3 class="text-white">{{ $dataBelumKlasifikasi }}</h3>
                        <div class="progress mb-2 bg-secondary">
                            <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                                            </div>
                        <small></small>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="widget-stat card bg-success">
            <div class="card-body  p-4">
                <div class="media">
                    <span class="mr-3">
                        <i class="la la-users"></i>
                    </span>
                    <div class="media-body text-white">
                        <p class="mb-1">Data yang Sudah Diklasifikasi</p>
                        <h3 class="text-white">{{ $totalKlasifikasi }}</h3>
                        <div class="progress mb-2 bg-secondary">
                            <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                                            </div>
                        <small></small>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Hasil Klasifikasi Naive Bayes</h4>
                </div>
                <div class="card-body">
                        <div class="card-header border-0 pb-3 d-sm-flex d-block ">
                            <h4 class="card-title">Tingkat Ekonomi</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mx-0 align-items-center">
                                <div class="col-sm-8 col-md-7 col-xxl-7 px-0 text-center mb-3 mb-sm-0">
                                    <div id="chart" class="d-inline-block"></div>
                                </div>
                                <div class="col-sm-4 col-md-5 col-xxl-5 px-0">
                                    <div class="chart-deta">
                                        <div class="col px-0">
                                            <span class="bg-warning"></span>	
                                            <div class="mx-3">
                                                <p class="fs-14">Mampu</p>
                                               
                                                <h3>{{ $tinggi }}</h3>
                                            </div>
                                        </div>
                                        <div class="col px-0">
                                            <span class="bg-primary"></span>	
                                            <div class="mx-3">
                                                <p class="fs-14">Menengah</p>
                                                <h3>{{ $sedang }}</h3>
                                            </div>
                                        </div>
                                        <div class="col px-0">
                                            <span class="bg-success"></span>	
                                            <div class="mx-3">
                                                <p class="fs-14">Kurang Mampu</p>
                                                <h3>{{ $rendah }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        

                </div>
            </div>
        </div>





    </div>
</div>
























@endsection