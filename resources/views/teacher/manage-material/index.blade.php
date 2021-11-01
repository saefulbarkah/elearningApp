@extends('layouts.master')
@push('css')
<!-- data tables -->
<link href="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css">
@endpush
@section('content')
 <h2 id="title">Daftarr Materi</h2>

<div class="row" id="tambah">
    <div class="col-md-12">
        <div class="card">
            <div class="card-head">
                <header>
                    <i class="fas fa-table"></i>
                    Data Materi
                </header>

                <div class="tools mt-4">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                </div>
                <div class="card-body float-end">
                    <button id="button-masuk" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="card-body ">
                <table id="example1" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Membuat rumus python</td>
                            <td>Matematika</td>
                            <td>XII</td>
                            <td>RPL</td>
                            <td>
                                <button id="edit-button" class="btn btn-info">
                                    <i class="fa fa-edit"></i>
                                    Edit
                                </button>
                                <a href="" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                    Hapus
                                </a>
                                <button id="button-detail" class="btn btn-success">
                                    <i class="fa fa-search"></i>
                                    Detail
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{--Tambah Materi--}}
 <div class="row" id="detail">
    @include('teacher.manage-material.create')
 </div>
 <div class="row" id="edit">
    @include('teacher.manage-material.edit')
 </div>
 <div class="row" id="detail-materi">
    @include('teacher.manage-material.detail')
 </div>
@push('js')
<!-- data tables -->
<script src="{{ asset('assets/bundles/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/data/table-data.js') }}"></script>
@endpush
@endsection


