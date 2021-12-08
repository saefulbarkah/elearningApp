@extends('layouts.master')

@section('title-page','Buat tugas')
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
                <a href="{{ route('manage-task')}}" class="btn btn-warning">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
               </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-head">
                <header>
                    <i class="fas fa-edit"></i>
                </header>
            </div>
        </div>
    </div>
</div>
@endsection
