@extends('layouts.master')

@push('styles')

@endpush
@section('title-page','Jadwal mapel')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-table"></i>
                Daftar jadwal mapel
            </div>
            <div class="card-body">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Hari</th>
                            <th>Jam mata pelajaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Senin</td>
                            <td>PWPB 08:00 - 11:00 | PBO 11:00 - 12:00 <a href=""
                                    class="btn-sm btn-primary float-right">Tambah</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Selasa</td>
                            <td>PWPB 08:00 - 11:00 | PBO 11:00 - 12:00 <a href=""
                                    class="btn-sm btn-primary float-right">Tambah</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Rabu</td>
                            <td>PWPB 08:00 - 11:00 | PBO 11:00 - 12:00 <a href=""
                                    class="btn-sm btn-primary float-right">Tambah</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Kamis</td>
                            <td>PWPB 08:00 - 11:00 | PBO 11:00 - 12:00 <a href=""
                                    class="btn-sm btn-primary float-right">Tambah</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Jumat</td>
                            <td>PWPB 08:00 - 11:00 | PBO 11:00 - 12:00 <a href=""
                                    class="btn-sm btn-primary float-right">Tambah</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('js')

@endpush
@endsection
