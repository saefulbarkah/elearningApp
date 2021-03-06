@extends('layouts.master')
@push('css')
<!-- data tables -->
<link href="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css">
@endpush
@section('title-page', 'Daftar Tugas')
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
                <a href="{{ url('teacher/manage-task/create') }}" class="btn btn-primary"> Tambah Data Tugas</a>
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
                    Data Tugas
                </header>
                <div class="tools">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                </div>
            </div>
            <div class="card-body ">
                <div class="table-responsive">
                <table id="example1" class="display nowrap">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Mata Pelajaran</th>
                            <th>kelas</th>
                            <th>Jurusan</th>
                            <th>Tanggal di mulai</th>
                            <th>Tanggal selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->subject_name }}</td>
                            <td>{{ $row->grade_name }}</td>
                            <td>{{ $row->major_name }}</td>
                            <td>{{ $row->start_time }}</td>
                            <td>{{ $row->end_time }}</td>
                            <td>
                                <a href="" class="btn btn-info">
                                    <i class="fa fa-edit"></i>
                                    Edit
                                </a>
                                <a href="" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
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
