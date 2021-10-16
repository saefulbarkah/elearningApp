@extends('layouts.master')

@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('title-page','Daftar tugas')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-table"></i>
                Daftar tugas
            </div>
            <div class="card-body">
                <table id="example2" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Informasi tugas</th>
                            <th>Tipe tugas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <span>Tugas Pemograman dasar kelas XI tanggal 20 Agustus 2021</span>
                                <br>
                                <small>
                                    <span><strong>Kelas</strong> : XI - RPL</span>
                                </small>
                                <p>
                                    <small>
                                        <strong>Pembuat</strong> : <a href="">Deden alif</a>, 07 Oktober 2021 21:27
                                    </small>
                                </p>
                            </td>
                            <td>
                                <span class="badge badge-info"> Ganda</span>
                            </td>
                            <td>
                                <a href="" class="btn-sm btn-info">
                                    Kerjakan
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
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      })
    })


</script>
@endpush
@endsection
