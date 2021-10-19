@extends('layouts.master')
@push('css')
<!-- data tables -->
<link href="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css">
@endpush
@section('title-page', 'Filter Siswa')
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
                <a href="" class="btn btn-primary">
                    <i class="fas fa-check"></i>
                    Absen
                </a>
            </div>
        </div>
    </div>
</div>
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
                            <th>Hari</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Senin</td>
                            <td>20 Agustus 2021</td>
                            <td>
                                <span class="badge badge-success">Hadir</span>
                            </td>
                            <td>
                                -
                            </td>
                        </tr>
                        <tr>
                            <td>Selasa</td>
                            <td>20 Agustus 2021</td>
                            <td>
                                <span class="badge badge-danger">Tidak hadir</span>
                            </td>
                            <td>
                                Sakit
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
