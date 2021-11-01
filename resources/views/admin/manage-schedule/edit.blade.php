@extends('layouts.master')
@push('css')
    {{-- toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Date Time item CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bundles/flatpicker/css/flatpickr.min.css') }}" />
@endpush
@section('title-page', 'Edit Jadwal Mata Pelajaran')
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
                    <a href="{{ route('manage-student') }}" class="btn btn-warning">
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
                    <form method="POST" action="{{ url('admin/manage-schedule/'.$schedule->id.'/update') }}">
                        @csrf
                        <!-- Hari -->
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Hari</label>
                            <select name="day_id" class="form-control custom-select @error('day_id') is-invalid @enderror"
                                id="exampleFormControlSelect1">
                                <option selected="" disabled="">---Pilih Hari ---</option>
                                @foreach ($day as $dy)
                                    <option value="{{ $dy->id }}" {{ ($schedule->day_id == $dy->id) ? 'selected' : '' }}>
                                        {{ $dy->name }}</option>
                                @endforeach
                            </select>
                            @error('day_id')
                                <div class="text-danger">* {{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Mata Pelajaran -->
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Mata Pelajaran</label>
                            <select name="subject_id"
                                class="form-control custom-select @error('subject_id') is-invalid @enderror"
                                id="exampleFormControlSelect1">
                                <option selected="" disabled="">---Pilih Mata Pelajaran ---</option>
                                @foreach ($subject as $sbj)
                                    <option value="{{ $sbj->id }}" {{ ($schedule->subject_id == $sbj->id) ? 'selected' : '' }}>
                                        {{ $sbj->name }}</option>
                                @endforeach
                            </select>
                            @error('subject_id')
                                <div class="text-danger">* {{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Kelas dan Jurusan -->
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kelas dan Jurusan</label>
                            <select name="grade_major_id"
                                class="form-control custom-select @error('grade_major_id') is-invalid @enderror"
                                id="exampleFormControlSelect1">
                                <option selected="" disabled="">---Pilih Kelas dan Jurusan ---</option>
                                @foreach ($grade_major as $grm)
                                    <option value="{{ $grm->id }}" {{ ($schedule->grade_major_id == $grm->id) ? 'selected' : '' }}>
                                        {{ $grm->gr_name }} - {{ $grm->mj_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('grade_major_id')
                                <div class="text-danger">* {{ $message }}</div>
                            @enderror
                        </div>
                        <!-- JAM -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Dari Jam</label>
                                    <input class="mdl-textfield__input flatpickr-input" type="text" name="start_time"
                                        id="time" readonly="readonly" value="{{ $schedule->start_time }}">
                                    @error('start_time')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Sampai Jam</label>
                                    <input class="mdl-textfield__input flatpickr-input" type="text" name="end_time"
                                        id="time" readonly="readonly" value="{{ $schedule->end_time }}">
                                    @error('end_time')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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
