@extends('layouts.master')

@section('title-page','Dashboard')
@section('content')

@role('admin')
<div class="state-overview">
    <div class="row">
        <div class="col-xl-4 col-md-6 col-12">
            <div class="info-box bg-blue">
                <span class="info-box-icon push-bottom"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Data siswa</span>
                    <span class="info-box-number">450</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 45%"></div>
                    </div>
                    <span class="progress-description">
                        45% Increase in 28 Days
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-4 col-md-6 col-12">
            <div class="info-box bg-orange">
                <span class="info-box-icon push-bottom"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Data Guru</span>
                    <span class="info-box-number">155</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 40%"></div>
                    </div>
                    <span class="progress-description">
                        40% Increase in 28 Days
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-4 col-md-6 col-12">
            <div class="info-box bg-purple">
                <span class="info-box-icon push-bottom"><i class="fas fa-book"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total mata pelajaran</span>
                    <span class="info-box-number">52</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        85% Increase in 28 Days
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-4 col-md-6 col-12">
            <div class="info-box bg-success">
                <span class="info-box-icon push-bottom"><i class="fas fa-bullhorn"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total pengumuman</span>
                    <span class="info-box-number">13,921</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                    </div>
                    <span class="progress-description">
                        50% Increase in 28 Days
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-xl-4 col-md-6 col-12">
            <div class="info-box bg-danger">
                <span class="info-box-icon push-bottom"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total pengguna</span>
                    <span class="info-box-number">13,921</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                    </div>
                    <span class="progress-description">
                        20% Increase in 28 Days
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
</div>
@endrole

@role('student|teacher')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <div class="card">
                <div class="card-head">

                    <header><i class="fas fa-bullhorn"></i> Pengumuman</header>
                </div>
                <div class="card-body no-padding height-9">
                    <div class="table-reponsive">
                        <table class="table table-strip">
                            <tr>
                                <td>
                                    <a href="">Besok libur</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="">Lusa Masuk</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-head">
                            <header><i class="fas fa-list"></i> Daftar materi</header>
                        </div>
                        <div class="card-body no-padding height-9">
                            <div class="table-reponsive">
                                <table class="table table-strip">
                                    <tr>
                                        <td>
                                            <a href="">Pemograman Dasar</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="">Pemograman Website</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <header><i class="fas fa-list"></i> Daftar Tugas</header>
                        </div>
                        <div class="card-body no-padding height-9">
                            <div class="table-reponsive">
                                <table class="table table-strip">
                                    <tr>
                                        <td>
                                            <a href="">Pemograman dasar: algoritma</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="">Membuat company profile</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
</div>
@endrole
@endsection
