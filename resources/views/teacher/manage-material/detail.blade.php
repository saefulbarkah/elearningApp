<div class="card">
    <div class="card-body no-padding height-9">
        <div class="row">
            <div class="card-body">
                <div class=" table-responsive ">
                    <button id="button-out" class="btn btn-warning float-end "><i class="icon-logout mt-2" style="font-size: 17px"></i></button>
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
            $('#detail-materi').hide();
            $('#button-out').hide();

            $("#button-detail").on('click', function (e) {
                e.preventDefault();
                $("#tambah").hide();
                $("#detail-materi").show();
                $("#button-detail").hide();
                $("#button-out").show();
                $("#title").html('Detail Materi');
            });
            $("#button-out").on('click', function (e) {
                e.preventDefault();
                $("#tambah").show();
                $("#detail-materi").hide();
                $("#button-detail").show();
                $("#button-out").hide();
                $("#title").html('Daftar Materi');
            });
        </script>
    @endpush
