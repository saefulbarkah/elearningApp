@extends('layouts.master')
@push('css')
    {{-- toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Date Time item CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bundles/flatpicker/css/flatpickr.min.css') }}" />
@endpush
@section('title-page', 'Tambah Jadwal Mata Pelajaran')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-head">
                    <header>
                        <i class="fas fa-bars"></i>
                        Menu
                    </header>
                </div>
                <div class="card-body">
                    <a href="{{ route('manage-class') }}" class="btn btn-warning">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-head">
                    <header>
                        <i class="fas fa-edit"></i>
                        Form Input Jadwal Mata Pelajaran
                    </header>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('class-store') }}">
                        @csrf
                        <!-- Kelas -->
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kelas</label>
                            <select name="grade_id" class="form-control custom-select @error('grade_id') is-invalid @enderror"
                                id="exampleFormControlSelect1">
                                <option selected="" disabled="">---Pilih Kelas ---</option>
                                @foreach ($grade as $gd)
                                    <option value="{{ $gd->id }}">{{ $gd->name }}</option>
                                @endforeach
                            </select>
                            @error('grade_id')
                                <div class="text-danger">* {{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Jurusan -->
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jurusan</label>
                            <select name="major_id"
                                class="form-control custom-select @error('major_id') is-invalid @enderror"
                                id="exampleFormControlSelect1">
                                <option selected="" disabled="">---Pilih Jurusan ---</option>
                                @foreach ($major as $mj)
                                    <option value="{{ $mj->id }}">{{ $mj->name }}</option>
                                @endforeach
                            </select>
                            @error('major_id')
                                <div class="text-danger">* {{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Group -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Grup</label>
                            <input type="number" class="form-control @error('grup') is-invalid @enderror" name="group"
                                id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off"
                                value="{{ old('grup') }}">
                            @error('grup')
                                <div class="text-danger">* {{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <!-- Material -->
        <script src="{{ asset('assets/data/date-time.init.js') }}"></script>
        <script src="{{ asset('assets/bundles/jquery-validation/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/bundles/jquery-validation/js/additional-methods.min.js') }}"></script>\
        <script src="{{ asset('assets/data/form-validation.js') }}"></script>

        {{-- toastr --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        @if (Session::has('error'))
            <script>
                toastr.error("{!! Session::get('error') !!}");
            </script>
        @endif
    @endpush
@endsection
