@extends('layouts.master')
@section('title-page', 'Edit Profile')
@push('css')
{{-- toastr --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <div class="card">
                <div class="card-body no-padding height-9">
                    <div class="row">
                        <div class="profile-userpic">
                            <img src="{{ asset('images/'.$student->image) }}" class="img-responsive" alt="">
                            <form action="{{ url('student/profile/image') }}" method="POST"
                                enctype="multipart/form-data">
                            </form>
                        </div>
                    </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">{{ $student->user_name }}</div>
                        <div class="profile-usertitle-job"> siswa </div>
                    </div>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Kelas</b> <span class="pull-right">{{ $student->grade_name }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Jurusan</b> <span class="pull-right">{{ $student->major_name }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <span class="pull-right">{{ $student->user_email }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="card">
                    <div class="card-topline-aqua card-head">
                        <header>
                            <i class="fas fa-bars"></i>
                            Menu
                        </header>
                    </div>
                    <div class="white-box">
                        <!-- Nav tabs -->
                        <div class="p-rl-20">
                            <ul class="nav customtab nav-tabs" role="tablist">
                                <li class="nav-item"><a href="#tab1" class="nav-link active " data-bs-toggle="tab">
                                        <i class="fas fa-user"></i>
                                        Biodata
                                    </a></li>
                                <li class="nav-item"><a href="#tab2" class="nav-link" data-bs-toggle="tab"> <i
                                            class="fas fa-lock"></i>
                                        Ubah kata sandi</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content mt-5">
                            <div class="tab-pane active" id="tab1">
                                <form method="POST" action="{{ url('student/profile/update',$student->user_id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alamat Email baru</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                                            autocomplete="off">
                                        @error('email')
                                        <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <form method="POST" action="{{ url('student/profile/update',$student->user_id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kata sandi baru</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">
                                        @error('password')
                                        <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Konfirmasi kata sandi</label>
                                        <input type="password"
                                            class="form-control @error('confirm') is-invalid @enderror" name="confirm"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">
                                        @error('confirm')
                                        <div class="text-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
{{-- toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@if (Session::has('error'))
<script>
    toastr.error("{!! Session::get('error') !!}");
</script>
@endif
@if (Session::has('success'))
<script>
    toastr.success("{!! Session::get('success') !!}");
</script>
@endif
@endpush
@endsection
