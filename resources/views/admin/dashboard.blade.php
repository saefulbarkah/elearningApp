@extends('layouts.master')

@section('content')
<div class="state-overview">
    <div class="row">
        <div class="col-xl-4 col-md-6 col-12">
            <div class="info-box bg-blue">
                <span class="info-box-icon push-bottom"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Data siswa</span>
                    <span class="info-box-number">{{ $data["student"] }}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 45%"></div>
                    </div>
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
                    <span class="info-box-number">{{ $data["guru"] }}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 40%"></div>
                    </div>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-4 col-md-6 col-12">
            <div class="info-box bg-danger">
                <span class="info-box-icon push-bottom"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total pengguna</span>
                    <span class="info-box-number">{{ $data["user"] }}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                    </div>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        {{-- col --}}
        <div class="col-xl-4 col-md-6 col-12">
            <div class="info-box bg-purple">
                <span class="info-box-icon push-bottom"><i class="fas fa-book"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total mata pelajaran</span>
                    <span class="info-box-number">{{ $data["subject"] }}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
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
                    <span class="info-box-number">{{ $data["pengumuman"] }}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                    </div>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
</div>
@endsection
