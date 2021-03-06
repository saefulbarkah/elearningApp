@extends('layouts.master')
@push('css')
{{-- toastr --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endpush
@section('title-page', 'Tambah Data Siswa')
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
                    Form Input Data Siswa
                </header>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('student-store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIS</label>
                        <input type="number" class="form-control @error('nis') is-invalid @enderror" name="nis"
                            id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">
                        @error('nis')
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
                        <label for="exampleFormControlSelect1">Kelas dan Jurusan</label>
                        <select name="grade_major_id" class="form-control custom-select @error('gender')
                        is-invalid
                    @enderror" id="exampleFormControlSelect1">
                            <option selected="" disabled="">---Pilih kelas ---</option>
                            @foreach ($gradeMajors as $data)
                            <option value="{{ $data->gm_id }}">{{ $data->grade_name }} - {{
                                $data->major_name
                                }} {{ $data->group }}</option>
                            @endforeach
                        </select>
                        @error('grade_major_id')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                        <select name="gender" class="form-control custom-select @error('gender')
                            is-invalid
                        @enderror" id="exampleFormControlSelect1">
                            <option selected="" disabled="">---Pilih Jenis Kelamin---</option>
                            <option value="L" class="laki">
                                Laki-laki</option>
                            <option value="P">Perempuan</option>
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
@endpush
@endsection
