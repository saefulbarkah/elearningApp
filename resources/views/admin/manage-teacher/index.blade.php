@extends('layouts.master')
@push('css')
<!-- data tables -->
<link href="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css">
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet"
    type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endpush
@section('title-page', 'Daftar pengajar')
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
                <a href="{{ route('teacher-create') }}" class="btn btn-primary"> Tambah data pengajar</a>
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
                    Data pengajar
                </header>
                <div class="tools">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                </div>
            </div>
            <div class="card-body ">
                <table id="example1" class="display nowrap  table-hover" style="width:100%;">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama lengkap</th>
                            <th>Jenis kelamin</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teacher as $data)
                        <tr>
                            <td>{{ $data->nip }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->gender }}</td>
                            <td>{{ $data->religion }}</td>
                            <td>{{ $data->address }}</td>
                            <td>
                                <img src="{{ asset('images/'.$data->image) }}" alt="" class="img fluid"
                                    style="width: 50px">
                            </td>
                            <td>
                                <a href="{{ url('admin/manage-teacher/'.$data->id.'/edit') }}" class="btn btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0);" class="btn btn-danger delete"
                                    data-id="{{ $data->id }}" data-name="{{ $data->name }}">
                                    <i class="fa fa-trash"></i>
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
@push('js')
<!-- data tables -->
<script src="{{ asset('assets/bundles/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets/data/table-data.js') }}"></script>
<script>
    $("#example1").on("click", ".delete", function(){
        var dataId = $(this).attr('data-id');
        var dataName = $(this).attr('data-name');
        swal({
            title: "Yakin ?",
            text: "Kamu akan menghapus data dengan id "+dataId+" Nama data "+dataName+"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            timer: 3000,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location.href = "manage-teacher/"+dataId+"/delete"
            } else {
                swal("Gagal menghapus data");
            }
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@if (Session::has('success'))
<script>
    toastr.success("{!! Session::get('success') !!}");
</script>
@endif
@endpush
@endsection
