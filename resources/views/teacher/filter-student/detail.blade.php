<div id="detail" class="card">
    <div class="card-body no-padding height-9">
        <div class="row">
            <div class="profile-userpic">
                <img src="https://png.pngtree.com/png-clipart/20190924/original/pngtree-user-vector-avatar-png-image_4830521.jpg" class="img-responsive" alt=""> </div>
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">Saeful Barkah </div>
            <div class="profile-usertitle-job"> XII - RPL </div>
        </div>
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>NIS</b> <a class="pull-right">1920.10.67</a>
            </li>
            <li class="list-group-item">
                <b>Kelas</b> <a class="pull-right">XII</a>
            </li>
            <li class="list-group-item">
                <b>Jurusan</b> <a class="pull-right">RPL</a>
            </li>
        </ul>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
            <button id="kembali" class="btn btn-circle btn-warning btn-sm">Kembali</button>
        </div>
        <!-- END SIDEBAR BUTTONS -->
    </div>
</div>

@push('js')
    <script>
        $("#detail").hide();
        $("#kembali").hide();

        $("#button-masuk").on('click', function (e) {
            e.preventDefault();
            $("#data").hide();
            $("#detail").show();
            $("#button-masuk").hide();
            $("#kembali").show();
            $("#title").html('Detail siswa');
        });
        $("#kembali").on('click', function (e) {
            e.preventDefault();
            $("#data").show();
            $("#detail").hide();
            $("#button-masuk").show();
            $("#kembali").hide();
            $("#title").html('Filter Siswa');
        });
    </script>
@endpush
