@extends('layouts.master')
@push('css')
<!-- data tables -->
<link href="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css">
@endpush
@section('content')
    <h2 id="title">Daftar Materi</h2>
<div class="row" id="data">
    <div class="col-md-12">
        <div class="card">
            <div class="card-head">
                <header>
                    <i class="fas fa-table"></i>
                    Data Materi
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
                            <td>Indonesia </td>
                            <td>26 Oktober 2021</td>
                            <td>
                                <span class="badge badge-danger">File</span>
                            </td>
                            <td>
                                <button id="button-masuk" class="btn-sm btn-success"> <i class="fas fa-search"></i> detail</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>

    @include('student.list-material.detail')

@push('js')

<!-- data tables -->
<script src="{{ asset('assets/bundles/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/data/table-data.js') }}"></script>
@endpush
@endsection

