<div class="col-md-12 col-sm-12">
    <div class="card card-box">
        <div class="card-head">
            <header><i></i>Edit Materi</header>
            <div class="tools mt-4">
                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
            </div>
            <div class="float-end">
            <button id="button" class="btn btn-warning float-end">
                <i class="icon-logout mt-2" style="font-size: 17px"></i>
            </button>
            </div>
        </div>
        <div class="card-body " >
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <label><i class="text-danger">*</i>Judul : </label>
                    <input type="text" class="form-control" placeholder="Judul">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <label><i class="text-danger">*</i>Mata Pelajaran</label>
                    <input type="text" class="form-control" placeholder="Mata Pelajaran">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <label><i class="text-danger">*</i>Kelas</label>
                    <select name="kelas" class="form-control">
                        <option>Pilih Kelas</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <label><i class="text-danger">*</i>Jurusan</label>
                    <select name="Jurusan" class="form-control">
                        <option>Pilih Jurusan</option>
                        <option value="mm">Multimedia</option>
                        <option value="rpl">RPL</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <label><i class="text-danger">*</i>Pilih File</label>
                    <input type="file" class="form-control" placeholder="Jurusan">
                </div>
            </div>
            <div class="col-lg-3 mt-2 float-end " >
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $("#edit").hide();
        $("#button-keluar").hide();

        $("#edit-button").on('click', function (e) {
            e.preventDefault();
            $("#tambah").hide();
            $("#edit").show();
            $("#edit-button").hide();
            $("#button").show();
            $("#title").html('Tambah Materi');
        });
        $("#button").on('click', function (e) {
            e.preventDefault();
            $("#tambah").show();
            $("#edit").hide();
            $("#edit-button").show();
            $("#button").hide();
            $("#title").html('Daftar Materi');
        });

    </script>

@endpush
