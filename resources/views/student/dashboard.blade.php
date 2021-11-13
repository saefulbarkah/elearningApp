@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-head">
                <header><i class="fas fa-list"></i> Daftar Tugas</header>
            </div>
            <div class="card-body no-padding height-9">
                <div class="table-reponsive">
                    <table class="table table-strip">
                        <tr>
                            <td>
                                <a href="">Pemograman dasar: algoritma</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="">Membuat company profile</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-head">
                    <header><i class="fas fa-list"></i> Daftar materi</header>
                </div>
                <div class="card-body no-padding height-9">
                    <div class="table-reponsive">
                        <table class="table table-strip">
                            <tr>
                                <td>
                                    <a href="">Pemograman Dasar</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="">Pemograman Website</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 order-first order-md-last">
        <div class="card">
            <div class="card-head">
                <header><i class="fas fa-bullhorn"></i> Pengumuman</header>
            </div>
            <div class="card-body no-padding height-9">
                <div class="table-reponsive">
                    <table class="table table-strip">
                        @foreach ($data as $row)
                        <tr>
                            <td>
                                <a href="{{ url('student/announcement/'.$row->id.'/detail') }}">{{ $row->title }}</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
