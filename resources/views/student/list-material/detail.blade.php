<div id="detail" class="card">
    <div class="card-body no-padding height-9">
        <div class="row">
            <div class="card-body">
                <div class=" table-responsive ">
                    <button id="button-keluar" class="btn btn-warning float-end "><i class="icon-logout mt-2" style="font-size: 17px"></i></button>
                    <table align="center">
                        <span><h2>Bahasa Indonesia</h2></span>
                        <thead>
                        <tr>
                            <th>Nama </th>
                            <td>: Indonesia</td>
                        </tr>

                        <tr>
                            <th>size </th>
                            <td>: 69 kb</td>
                        </tr>

                        <tr>
                            <th>Modifed</th>
                            <td>: 26 Oktober 2021</td>
                        </tr>

                        <tr>
                            <th>Mime</th>
                            <td>: file/pdf</td>
                        </tr>

                        </thead>
                    </table>
                </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
            <div class="profile-userbuttons mb-3">
                <button type="submit" class="btn btn-circle btn-success btn-sm"><i class="fa fa-download"></i>Download</button>
            </div>
            <!-- END SIDEBAR BUTTONS -->
        </div>
    </div>
</div>

@push('js')
    <script>
        $("#detail").hide();
        $("#buttonDatatable").hide();

        $("#button-masuk").on('click', function (e) {
            e.preventDefault();
            $("#data").hide();
            $("#detail").show();
            $("#button-masuk").hide();
            $("#button-keluar").show();
            $("#title").html('Detail Materi');
        });
        $("#button-keluar").on('click', function (e) {
            e.preventDefault();
            $("#data").show();
            $("#detail").hide();
            $("#button-masuk").show();
            $("#button-keluar").hide();
            $("#title").html('Daftar Materi');
        });
    </script>
@endpush
