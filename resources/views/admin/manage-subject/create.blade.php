@extends('layouts.master')
@section('title-page', 'Tambah mata pelajaran')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-head">
                <header>
                    <i class="fa fa-bars"></i>
                    Form input
                </header>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mata Pelajaran</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                            aria-describedby="emailHelp" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="user_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled="disabled">---Pilih Kelas---</option>
                            @foreach ($grade as $grd)
                            <option value="{{ $grd->id }}">{{ $grd->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
