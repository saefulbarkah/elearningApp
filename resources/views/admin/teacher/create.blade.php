@extends('layouts.master')
@section('title-page', 'Tambah pengajar')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-bars"></i>
                    Menu
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIP</label>
                            <input type="number" class="form-control" name="nip" id="exampleInputEmail1"
                                aria-describedby="emailHelp" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                aria-describedby="emailHelp" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="gender" class="form-control custom-select" id="exampleFormControlSelect1">
                                <option selected="" disabled="">---Pilih Jenis Kelamin---</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tempat Lahir</label>
                            <input type="text" class="form-control" name="birth_place" id="exampleInputEmail1"
                                aria-describedby="emailHelp" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="birth_date" id="exampleInputEmail1"
                                aria-describedby="emailHelp" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Agama</label>
                            <select class="form-control custom-select" name="religion_name" id="exampleFormControlSelect1">
                                <option selected="" disabled="">---Pilih Agama---</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea class="form-control" name="address" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>
                        <label for="exampleInputEmail1">Foto</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="image" name="image" onchange="previewImage()"
                                aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script src="{{ asset('assets/bs-custom-file-input/dist/bs-custom-file-input.js') }}"></script>
        <script>
            $(document).ready(function() {
                bsCustomFileInput.init();
            });
        </script>
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
    @endpush
@endsection
