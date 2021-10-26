@extends('layouts.master')
@push('css')
<!-- data tables -->
<link href="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css">
@endpush
@section('title-page', 'Daftar materi')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-head">
                <header>
                    <i class="fas fa-table"></i>
                    Data materi
                </header>
                <div class="tools">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                </div>
            </div>
            <div class="card-body table-responsive ">
{{--                <div class="table-responsive">--}}
                <table id="example1" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pemograman Dasar</td>
                            <td>20 Agustus 2021</td>
                            <td>
                                <span class="badge badge-success">Teks</span>
                            </td>
                            <td>
                                <a href="" class="btn-sm btn-success"> <i class="fas fa-search"></i> Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Laravel 8</td>
                            <td>20 Agustus 2021</td>
                            <td>
                                <span class="badge badge-danger">File</span>
                            </td>
                            <td>
                                <a href="" class="btn-sm btn-primary"> <i class="fas fa-download"></i> Unduh</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
{{--                </div>--}}
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
