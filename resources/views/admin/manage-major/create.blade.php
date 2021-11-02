@extends('layouts.master')
@push('css')
    {{-- toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endpush
@section('title-page', 'Tambah Jurusan')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-head">
                    <header>
                        <i class="fa fa-bars"></i>
                        Menu
                    </header>
                </div>
                <div class="card-body">
                    <a href="{{ route('manage-major') }}" class="btn btn-warning">
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
                        <i class="fa fa-bars"></i>
                        Form Input
                    </header>
                </div>
                <div class="card-body">
                    <form action="{{ route('major-store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jurusan</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">* {{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        </script>
        <script src="{{ asset('assets/bundles/jquery-validation/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/bundles/jquery-validation/js/additional-methods.min.js') }}"></script>
        <script src="{{ asset('assets/data/form-validation.js') }}"></script>

        {{-- toastr --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        @if (Session::has('error'))
            <script>
                toastr.error("{!! Session::get('error') !!}");
            </script>
        @endif
    @endpush
    @include('sweetalert::alert')
@endsection
