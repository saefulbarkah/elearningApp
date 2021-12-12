@extends('layouts.master')
@push('css')
    <!-- summernote -->
    <link href="{{ asset('assets/summernote-bs4.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endpush
@section('title-page','Buat tugas')
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
                <a href="{{ route('manage-task')}}" class="btn btn-warning">
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
                    <i class="fa fa-edit"></i>
                    Form input
                </header>
            </div>
            <div class="card-body">
                <form action="{{ route('task-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="exampleInputEmail1"
                            aria-describedby="emailHelp" autocomplete="off">
                            @error('title')
                            <div class="text-danger">* {{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="subject_id" value="{{ $subject->id }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kelas dan jurusan</label>
                        <select class="js-example-basic-single form-control @error('grade_major_id')
                        is-invalid
                         @enderror" name="grade_major_id">
                            <option selected="" disabled="">---Pilih Kelas dan jurusan---</option>
                            @foreach ($gradeMajors as $item)
                            <option value="{{ $item->gm_id }}" >{{ $item->grade_name }} | {{ $item->major_name }} {{ $item->group }}</option>
                            @endforeach
                         </select>
                         @error('grade_major_id')
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
                                    <input class="mdl-textfield__input" type="text"  autocomplete="off" name="start_time" id="date" class="@error('start_time') is-invalid @enderror" >
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
                                    <input class="mdl-textfield__input" type="text" autocomplete="off" name="end_time" id="date" class="@error('end_time') is-invalid @enderror" >
                                    <label class="mdl-textfield__label">Pilih tanggal</label>
                                </div>
                                @error('end_time')
                                <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea class="form-control" name="description" rows="5"></textarea>
                        @error('description')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleInputEmail1" class="mb-4">Upload file tugas</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" name="file">
                            <label class="custom-file-label" for="inputGroupFile01">Upload file</label>
                        </div>
                        @error('file')
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

<script src="{{ asset('assets/data/date-time.init.js') }}"></script>
<!--Image-->
<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
         $('select').select2({
        theme: 'bootstrap4',
    });
});
</script>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
@endsection
