@extends('layouts.master')
@push('css')
<!-- data tables -->
<link href="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css">
@endpush
@section('title-page', 'Filter Siswa')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-head">
                <header>
                    <i class="fas fa-table"></i>
                    Data siswa
                </header>
                <div class="tools">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                </div>
            </div>
            <div class="card-body ">
                <table id="example1" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Nama lengkap</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Saeful Barkah</td>
                            <td>XII</td>
                            <td>RPl</td>
                            <td>
                                <img src="https://png.pngtree.com/png-clipart/20190924/original/pngtree-user-vector-avatar-png-image_4830521.jpg"
                                    alt="" width="30px">
                            </td>
                            <td>
                                <a href="" class="btn btn-success">
                                    <i class="fa fa-search"></i>
                                    Detail
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('js')
<!-- data tables -->
<script src="{{ asset('assets/bundles/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/data/table-data.js') }}"></script>
@endpush
@endsection
