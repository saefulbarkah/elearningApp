@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div id="sebelum" class="card">
            <div class="card-head">
                <header>
                    <i class="fas fa-bullhorn"></i>
                    Pengumuman
                </header>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h4><strong>{{ $announc->title }}</strong></h4>
                        <small class="text-muted">{{ date('d M Y',strtotime($announc->start_time)) }} s/d {{ date('d M Y',strtotime($announc->end_time)) }}</small>
                    </div>
                    <div class="col-lg-12">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                     {{$announc->description}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-head">
                <header>
                    <i class="fas fa-list"></i>
                    Daftar Pengumuman
                </header>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-strip">
                      @foreach ($announcement as $annc)
                          <tr>
                              <td><a href="{{ url('student/announcement/'.$annc->id.'/detail') }}">{{ $annc->title }}</a></td>
                          </tr>
                      @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
