@extends('layouts.master')
@push('css')
<!-- data tables -->
<link href="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css">
@endpush
@section('title-page', 'Daftar Kehadiran')
@section('content')
        <div class="card card-box">
            <div class="card-head">
                <header>Simple Form</header>
            </div>
            <div class="card-body " id="bar-parent">
                <form>
                    <div class="form-group">
                        <label for="simpleFormEmail">Keterangan</label>
                        <div class="checkbox checkbox-icon-black mt-2 p-0">
                            <input id="checkbox2" type="checkbox" class="margin-right-10" checked="checked">
                            <label for="checkbox2">
                                Hadir
                            </label>
                            <input id="checkbox" type="checkbox" class="ml-2" checked="checked">
                            <label for="checkbox">
                                Izin
                            </label>
                            <input id="checkbox1" type="checkbox" class="ml-2" checked="checked">
                            <label for="checkbox1">
                                Sakit
                            </label>
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1" class="mb-4"><i class="text-danger ">*</i>Upload gambar</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <div class="custom-file ">
                                <input type="file" class="custom-file-input myImage" accept="image/*" id="image" name="image"
                                       onchange="previewImage()" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>
                            </div>
                            @error('image')
                            <div class="text-danger">* {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox checkbox-icon-black">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                </form>
            </div>
        </div>

@push('js')
<!-- data tables -->
<script src="{{ asset('assets/bundles/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/data/table-data.js') }}"></script>

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
