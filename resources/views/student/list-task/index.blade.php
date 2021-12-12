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
                    <i class="fas fa-search"></i>
                    Filter tugas
                </header>
            </div>
            <div class="card-body">
                <input class="filter form-control" placeholder="cari....." />
            </div>
        </div>
    </div>
</div>

<div class="row">
    @foreach ($data as $item)
    <div class="col-lg-4 col-md-6 col-sm-12">
        <!-- BEGIN PROFILE SIDEBAR -->
            <div class="card">
                <div class="card-body no-padding height-9">
                    <div class="row">
                    </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">{{ $item->title }}</div>
                        <div class="profile-usertitle-job"></div>
                    </div>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Mata pelajaran</b> <span class="pull-right">{{ $item->subject_name }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Batas pengumpulan</b> <span class="pull-right badge badge-danger">{{ $item->end_time }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>File</b>
                            @if (pathinfo($item->file, PATHINFO_EXTENSION) == 'pdf')
                            <span class="pull-right">Dokumen</span>
                            @else
                             <span class="pull-right">Gambar</span>
                            @endif
                        </li>
                    </ul>
                    <br>
                    <a href="" class="btn-sm btn-primary">Kerjakan</a>
                    <a href="" class="btn-sm btn-success">Lihat tugas</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@push('js')
<!-- data tables -->
<script src="{{ asset('assets/bundles/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/data/table-data.js') }}"></script>
<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>
@endpush
@endsection
