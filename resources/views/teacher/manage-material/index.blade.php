@extends('layouts.master')
@push('css')
    <!-- data tables -->
    <link href="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">
@endpush
@section('title-page', 'Daftar materi')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <a href="{{ url('teacher/manage-material/create') }}" class="btn btn-primary">
                        <i class="fas fa-upload">
                        </i>
                        Buat materi
                    </a>
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
                        Data Materi
                    </header>
                </div>
                <div class="card-body ">
                    <div class="table-responsive">
                        <table id="example1" class="display nowarp" style="width:100%;">
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
                                @foreach ($material as $data)
                                    <tr>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->subject_name }}</td>
                                        <td>{{ $data->grade_name }}</td>
                                        <td>{{ $data->major_name }}</td>
                                        <td>
                                            <a href="{{ url('teacher/manage-material/edit', $data->id) }}"
                                                class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-danger delete"
                                                data-id="{{ $data->id }}" data-name="{{ $data->title }}">
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
    </div>
    @push('js')
        <!-- data tables -->
        <script src="{{ asset('assets/bundles/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/data/table-data.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('.delete').click(function(e) {
                    e.preventDefault();
                    var dataId = $(this).attr('data-id');
                    var dataName = $(this).attr('data-name');
                    Swal.fire({
                        title: 'Apa kamu yakin?',
                        text: "Kamu akan mengahpus data " + dataName,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus data!',
                        cancelButtonText: 'Batalkan',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "/teacher/manage-material/delete/" + dataId;
                        }
                    })
                });
            });
        </script>
        @if (Session::has('success'))
            <script>
                Swal.fire(
                    'Berhasil',
                    '{{ Session::get('success') }}',
                    'success'
                )
            </script>
        @endif
    @endpush
@endsection
