@extends('layouts.master')
@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
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
                            <label for="exampleInputEmail1">Mata Pelajaran</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                aria-describedby="emailHelp" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="user_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected" disabled="disabled">---Pilih Kelas---</option>
                                @foreach ($grade as $grd)
                                    <option value="{{ $grd->id }}">{{ $grd->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <!-- Select2 -->
        <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2({
                    theme: 'bootstrap4'
                });
            });
        </script>
    @endpush

@endsection
