@extends('layouts.master')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

@endpush
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
                <a href="{{ route('manage-material') }}" class="btn btn-warning">
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
                    Form materi
                </header>
            </div>
            <div class="card-body">
                <form action="{{ url('teacher/manage-material/post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Judul materi</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">
                        @error('title')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Materi</label>
                        <input type="text" disabled value="{{ $materi->name }}" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">
                        <input type="hidden" value="{{ $materi->id }}" name="subject_id" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">
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
                        <label for="exampleFormControlTextarea1">Deskripsi materi</label>
                        <textarea class="form-control @error('description')
                            is-invalid
                        @enderror" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('description')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleInputEmail1" class="mb-4">Upload file materi</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" name="file">
                            <label class="custom-file-label" for="inputGroupFile01">Upload file</label>
                        </div>
                        @error('file')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
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
