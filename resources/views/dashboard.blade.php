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
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head">
                <header>
                    <i class="fa fa-users"></i>
                    Aktivitas Login
                </header>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Waktu</th>
                        <th>Role</th>
                    </tr>
                    @foreach ($activityLog as $no => $data)
                    @php
                    $json = $data->data;
                    $json_decod = json_decode($json)
                    @endphp
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ Carbon\Carbon::parse($data->log_date)->diffForHumans(null, true).' yang lalu' }}</td>
                        <td>
                            @if ($data->role_name == 'admin')
                            <span class="badge badge-info">{{ $data->role_name }}</span>
                            @endif
                            @if ($data->role_name == 'teacher')
                            <span class="badge badge-warning">{{ $data->role_name }}</span>
                            @endif
                            @if ($data->role_name == 'student')
                            <span class="badge badge-success">{{ $data->role_name }}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endrole

@role('student|teacher')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-head">
                <header>
                    <i class="fa fa-book"></i>
                    Daftar tugas
                </header>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Tugas 1</td>
                    </tr>
                    <tr>
                        <td>Tugas 1</td>
                    </tr>
                    <tr>
                        <td>Tugas 1</td>
                    </tr>
                    <tr>
                        <td>Tugas 1</td>
                    </tr>
                    <tr>
                        <td>Tugas 1</td>
                    </tr>
                    <tr>
                        <td>Tugas 1</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-head">
                <header>
                    <i class="fa fa-bullhorn"></i>
                    Pengumuman
                </header>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>
                            <a href="">Hari ini pulang semua</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="">Minggu depan ujian</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="">Minggu depan ujian</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="">Minggu depan ujian</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="">Minggu depan ujian</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-head">
                <header>
                    <i class="fa fa-book"></i>
                    Daftar materi
                </header>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Materi 1</td>
                    </tr>
                    <tr>
                        <td>Materi 1</td>
                    </tr>
                    <tr>
                        <td>Materi 1</td>
                    </tr>
                    <tr>
                        <td>Materi 1</td>
                    </tr>
                    <tr>
                        <td>Materi 1</td>
                    </tr>
                    <tr>
                        <td>Materi 1</td>
                    </tr>
                    <tr>
                        <td>Materi 1</td>
                    </tr>
                    <tr>
                        <td>Materi 1</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-head">
                <header>
                    <i class="fa fa-users"></i>
                    Riwayat login
                </header>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($activityLog as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ Carbon\Carbon::parse($data->log_date)->diffForHumans(null, true).' yang lalu' }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endrole
@endsection
