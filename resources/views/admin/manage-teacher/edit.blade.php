@extends('layouts.master')
@push('css')
{{-- toastr --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endpush
@section('title-page', 'Tambah pengajar')
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
                    Form edit data guru
                </header>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('admin/manage-teacher/'.$teacher->id.'/update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" id="" value="{{ $teacher->user_id }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIP</label>
                        <input type="number" class="form-control @error('nip') is-invalid @enderror" name="nip"
                            id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off"
                            value="{{ $teacher->nip }}">
                        @error('nip')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off"
                            value="{{ $teacher->user_name }}">
                        @error('name')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off"
                            value="{{ $teacher->user_email }}">
                        @error('email')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                        <select name="gender" class="form-control custom-select @error('gender')
                            is-invalid
                        @enderror" id="exampleFormControlSelect1">
                            <option selected="" disabled="">---Pilih Jenis Kelamin---</option>
                            <option value="L" @if ($teacher->gender == "L")
                                selected
                                @endif>
                                Laki-laki
                            </option>
                            <option value="P" @if ($teacher->gender == "P")
                                selected
                                @endif>
                                Perempuan
                            </option>
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
                            <option value="Islam" @if ($teacher->religion == "Islam")
                                selected
                                @endif>Islam
                            </option>
                            <option value="Kristen" @if ($teacher->religion == "Kristen")
                                selected
                                @endif>
                                Kristen
                            </option>
                            <option value="Katolik" @if ($teacher->religion == "Katolik")
                                selected
                                @endif>Katolik</option>
                            <option value="Hindu" @if ($teacher->religion == "Hindu")
                                selected
                                @endif>Hindu</option>
                            <option value="Buddha" @if ($teacher->religion == "Buddha")
                                selected
                                @endif>Buddha</option>
                            <option value="Konghucu" @if ($teacher->religion == "Konghucu")
                                selected
                                @endif>Konghucu</option>
                        </select>
                        @error('religion')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control @error('address')
                            is-invalid
                        @enderror" name="address" id="exampleFormControlTextarea1"
                            rows="3">{{ $teacher->address }}</textarea>
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
