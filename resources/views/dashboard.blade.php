@extends('layouts.master')

@section('title-page','Dashboard')
@section('content')


@role('student|teacher')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-book"></i>
                Daftar Tugas
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Tugas 1</td>
                    </tr>
                    <tr>
                        <td>Tugas 1</td>
                    </tr>
                    <tr>
                        <td>Tugas 1</td>
                    </tr>
                    <tr>
                        <td>Tugas 1</td>
                    </tr>
                    <tr>
                        <td>Tugas 1</td>
                    </tr>
                    <tr>
                        <td>Tugas 1</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-book"></i>
                Daftar Materi
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Materi 1</td>
                    </tr>
                    <tr>
                        <td>Materi 1</td>
                    </tr>
                    <tr>
                        <td>Materi 1</td>
                    </tr>
                    <tr>
                        <td>Materi 1</td>
                    </tr>
                    <tr>
                        <td>Materi 1</td>
                    </tr>
                    <tr>
                        <td>Materi 1</td>
                    </tr>
                    <tr>
                        <td>Materi 1</td>
                    </tr>
                    <tr>
                        <td>Materi 1</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-bullhorn"></i>
                Pengumuman
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>
                            <a href="">Hari ini pulang semua</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="">Minggu depan ujian</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="">Minggu depan ujian</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="">Minggu depan ujian</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="">Minggu depan ujian</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <i class="fa fa-users"></i>
                Aktivitas Login
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($activityLog as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ Carbon\Carbon::parse($data->log_date)->diffForHumans(null, true).' yang lalu' }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endrole
@endsection
