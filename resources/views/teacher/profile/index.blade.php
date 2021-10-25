@extends('layouts.master')
@push('css')
    <!-- data tables -->
    <link href="{{ asset('assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') }}"
          rel="stylesheet"
          type="text/css">
@endpush
@section('title-page', 'Edit Profile')
@section('content')

    @push('js')
    @endpush
@endsection
