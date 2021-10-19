@extends('layouts.master')
@push('styles')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
@section('title-page', 'Tambah guru mapel')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-head">
                <header>
                    <i class="fas fa-table"></i>
                    Form input
                </header>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label>Pengajar</label>
                        <select name="user_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled="disabled">---Pilih Pengajar---</option>
                            @foreach ($teacher as $tcr)
                            <option value="{{ $tcr->id }}">{{ $tcr->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <select name="user_id" class="form-control select2" style="width: 100%;" multiple
                            data-placeholder="---Pilih Mata Pelajaran---">
                            @foreach ($subject as $sbj)
                            <option value="{{ $sbj->id }}">{{ $sbj->name }} @if ($sbj->grade_id == '1')
                                (Kelas X)
                                @elseif ($sbj->grade_id == '2')
                                (Kelas XI)
                                @elseif ($sbj->grade_id == '3')
                                (Kelas XII)
                                @endif
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function() {
                //Initialize Select2 Elements
                $('.select2').select2({
                    theme: 'bootstrap4'
                });
            });
</script>
@endpush

@endsection
