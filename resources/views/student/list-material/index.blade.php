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
                {{-- <div class="table-responsive">--}}
                    <table id="example1" class="display" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($material as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>
                                    {{-- <a href="{{ url('student/material/detail/'.$item->id) }}"
                                        class="btn-sm btn-success"> <i class="fas fa-search"></i>
                                        detail</a> --}}
                                    <a href="{{ url('student/material/download/file/'.$item->id) }}"
                                        class="btn-sm btn-primary"> <i class="fas fa-download"></i>
                                        unduh</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{--
                </div>--}}
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
