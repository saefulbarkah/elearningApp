@extends('layouts.master')
@push('css')
 <!-- data tables -->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet"
type="text/css">
<link href="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endpush
@section('title-page', 'Daftar Jadwal Mapel')
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
                    <a href="{{ route('schedule-create') }}" class="btn btn-primary"> Tambah Data Jadwal Pelajaran</a>
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
                        Data Jadwal Pelajaran
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
                                <th>Mata Pelajaran</th>
                                <th>Kelas dan Jurusan</th>
                                <th>Dari Jam</th>
                                <th>Sampai Jam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedule as $sch)
                                <tr>
                                    <td>{{ $sch->d_name }}</td>
                                    <td>{{ $sch->sbj_name }}</td>
                                    <td></td>
                                    <td>{{ $sch->start_time }}</td>
                                    <td>{{ $sch->end_time }}</td>
                                    <td>
                                        <a href="{{ url('admin/manage-schedule/' . $sch->id . '/edit') }}"
                                            class="btn btn-info btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        {{-- <a href="javascript:void(0);" class="btn btn-danger btn-xs delete"
                                            data-id="{{ $sbj->id }}" data-name="{{ $sbj->name }}">
                                            <i class="fa fa-trash"></i>
                                        </a> --}}
                                    </td>
                                </tr>
                                </tr>
                            @endforeach
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
           {{-- toastr --}}
           <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        @if (Session::has('success'))
        <script>
            toastr.success("{!! Session::get('success') !!}");
        </script>
        @endif
    @endpush
@endsection
