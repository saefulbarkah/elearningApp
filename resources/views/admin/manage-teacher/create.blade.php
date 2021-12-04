@extends('layouts.master')
@push('css')
{{-- toastr --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endpush
@section('title-page', 'Tambah Pengajar')
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
                <a href="{{ route('manage-teacher') }}" class="btn btn-warning">
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
                    Form Input Data Guru
                </header>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('teacher-store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIP</label>
                        <input type="number" class="form-control @error('nip') is-invalid @enderror" name="nip"
                            id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">
                        @error('nip')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">
                        @error('name')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">
                        @error('email')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Bidang keahlian</label>
                        <select class="js-example-basic-single form-control @error('subject_id')
                        is-invalid
                         @enderror" name="subject_id">
                            <option selected="" disabled="">---Pilih bidang keahlian---</option>
                            @foreach ($subject as $item)
                            <option value="{{ $item->id }}" class="laki">{{ $item->name }}</option>
                            @endforeach
                         </select>
                         @error('subject_id')
                         <div class="text-danger">* {{ $message }}</div>
                         @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Bidang kelas</label>
                        <select class="js-example-basic-single form-control @error('grade_major_id')
                        is-invalid
                         @enderror" name="grade_major_id">
                            <option selected="" disabled="">---Pilih Kelas---</option>
                            @foreach ($gradeMajor as $item)
                            <option value="{{ $item->gm_id }}" class="laki">{{ $item->grade_name }} | {{ $item->major_name }} {{ $item->group }}</option>
                            @endforeach
                         </select>
                         @error('grade_major_id')
                         <div class="text-danger">* {{ $message }}</div>
                         @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                        <select class="js-example-basic-single form-control @error('gender')
                        is-invalid
                         @enderror" name="gender">
                            <option selected="" disabled="">---Pilih Jenis Kelamin---</option>
                            <option value="L" >Laki Laki</option>
                            <option value="P" >Perempuan</option>
                         </select>
                         @error('gender')
                         <div class="text-danger">* {{ $message }}</div>
                         @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Agama</label>
                        <select class="form-control custom-select @error('religion')
                        is-invalid
                        @enderror " name="religion" id="exampleFormControlSelect1">
                            <option selected="" disabled="">---Pilih Agama---</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                        @error('religion')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control @error('address')
                            is-invalid
                        @enderror" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('address')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleInputEmail1" class="mb-4">Upload gambar</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input myImage" id="image" name="image"
                                onchange="previewImage()" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>
                        </div>
                        @error('image')
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
<!--Image-->
<script>
        // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
             $('select').select2({
            theme: 'bootstrap4',
        });
    });
    function previewImage() {
                const image = document.querySelector('#image');
                const imgPreview = document.querySelector('.img-preview');


                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
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
