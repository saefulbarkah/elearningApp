<div class="col-md-12 col-sm-12">
    <div class="card card-box">
        <div class="card-head">
            <header><i class="fa fa-plus-circle"></i>Tambah Materi</header>
            <div class="tools mt-4">
                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
            </div>
            <div class="float-end">
                <button id="button-keluar" class="btn btn-warning float-end">
                    <i class="icon-logout mt-2" style="font-size: 17px"></i>
                </button>
            </div>
        </div>
        <div class="card-body ">
            <div class="row">
                <form action="javascript:void(0);" class="frm-submit" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6">
                        <label><i class="text-danger">*</i>Judul : </label>
                        <input type="text" name="title" class="form-control" placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Mata Pelajaran</label>
                        <select name="subject_id" class="form-control custom-select @error('gender')
                        is-invalid
                        @enderror" id="exampleFormControlSelect1">
                            <option selected="" disabled="">---Pilih kelas ---</option>
                            @foreach ($subject as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                        @error('grade_major_id')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kelas dan Jurusan</label>
                        <select name="grade_major_id" class="form-control custom-select @error('gender')
                        is-invalid
                    @enderror" id="exampleFormControlSelect1">
                            <option selected="" disabled="">---Pilih kelas ---</option>
                            @foreach ($gradeMajors as $data)
                            <option value="{{ $data->gm_id }}">{{ $data->grade_name }} - {{
                                $data->major_name
                                }} {{ $data->group }}</option>
                            @endforeach
                        </select>
                        @error('grade_major_id')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control @error('address')
                            is-invalid
                        @enderror" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('address')
                        <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-12 col-md-4 col-sm-4 col-xs-4">
                        <label><i class="text-danger">*</i>Pilih File</label>
                        <input type="file" class="form-control" name="file" placeholder="Jurusan">
                    </div>
            </div>
            <div class="col-lg-3 mt-2 float-start">
                <button type="submit" id="submit" class="btn btn-success">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
@push('js')
<script>
    $("#detail").hide();
    $("#button-keluar").hide();

    $("#button-masuk").on('click', function (e) {
        e.preventDefault();
        $("#tambah").hide();
        $("#detail").show();
        $("#button-masuk").hide();
        $("#button-keluar").show();
        $("#title").html('Tambah Materi');
    });
    $("#button-keluar").on('click', function (e) {
        e.preventDefault();
        $("#tambah").show();
        $("#detail").hide();
        $("#button-masuk").show();
        $("#button-keluar").hide();
        $("#title").html('Daftar Materi');
    });
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".frm-submit").click('#submit',(function(){
        alert
    ))}
</script>
@endpush
