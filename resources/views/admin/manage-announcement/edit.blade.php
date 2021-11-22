@extends('layouts.master')
@push('css')
    <!-- summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@section('title-page', 'Tambah Pengumuman')
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
                    <a href="{{ route('manage-announcement') }}" class="btn btn-warning"><i class="fas fa-arrow-left"></i>
                        Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-head">
                    <header>
                        <i class="fa fa-edit"></i>
                        Form input
                    </header>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/manage-announcement/' . $data->id . '/update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off"
                                value="{{ $data->title }}">
                            @error('title')
                                <div class="text-danger">* {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="exampleFormControlTextarea1"></label>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Tanggal dimulai : </label>

                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text"
                                            value="{{ date('d-m-Y', strtotime($data->start_time)) }}" autocomplete="off"
                                            name="start_time" id="date" class="@error('start_time') is-invalid @enderror">
                                        <label class="mdl-textfield__label">Pilih tanggal</label>
                                    </div>
                                    @error('start_time')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>Tanggal selesai : </label>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text"
                                            value="{{ date('d-m-Y', strtotime($data->end_time)) }}" autocomplete="off"
                                            name="end_time" id="date" class="@error('end_time') is-invalid @enderror">
                                        <label class="mdl-textfield__label">Pilih tanggal</label>
                                    </div>
                                    @error('end_time')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea id="summernote" name="description">{{ $data->description }}</textarea>
                            @error('description')
                                <div class="text-danger">* {{ $message }}</div>
                            @enderror
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <!-- Summernote -->
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote({
                    placeholder: 'Deskripsi pengumuman',
                    tabsize: 2,
                    height: 400
                });
            });
        </script>

        <script src="{{ asset('assets/data/date-time.init.js') }}"></script>
    @endpush
@endsection
