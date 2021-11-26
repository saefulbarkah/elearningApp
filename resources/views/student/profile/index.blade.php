@extends('layouts.master')
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
                            <i class="fas fa-edit"></i>
                            Edit profil
                        </header>
                    </div>
                    <div class="card-body pt-5 pb-5">
                        <form method="POST" action="{{ url('student/profile/update',$student->user_id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kata sandi baru</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    autocomplete="off" value="{{ old('password') }}">
                                @error('password')
                                <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Konfirmasi kata sandi</label>
                                <input type="password" class="form-control @error('confirm') is-invalid @enderror"
                                    name="confirm" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    autocomplete="off" value="{{ old('password') }}">
                                @error('confirm')
                                <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                        </form>
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
