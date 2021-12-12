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
                <input id="myInput" value="" class="filter form-control" placeholder="cari....." />
            </div>
        </div>
    </div>
</div>

<div class="row">
    <h3>Tugas Terbaru</h3>
    @foreach ($data as $item)
    <div class="col-lg-6 col-md-6 col-sm-12" id="MyCards">
        <!-- BEGIN PROFILE SIDEBAR -->
            <div class="card">
                <div class="card-body no-padding height-9">
                    <div class="row">
                    </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name title">{{ $item->title }}</div>
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
                    @if (pathinfo($item->file, PATHINFO_EXTENSION) == 'png' && 'jpg')
                    <a href="{{ asset('images/task/'.$item->file) }}" class="btn-sm btn-primary" target="_blank">Detail</a>
                    @else
                    <a href="{{ asset('file/task',$item->file) }}"></a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
<!-- Modal -->
@push('js')
<!-- data tables -->
<script src="{{ asset('assets/bundles/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/data/table-data.js') }}"></script>
<script>
$(document).ready(function() {
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#MyCards .card").filter(function() {
      $(this).toggle($(this).find('.title').text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endpush
@endsection
