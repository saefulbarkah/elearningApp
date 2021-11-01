<div id="data" class="card">
    <div class="card-body no-padding height-9">
        <div class="row">
            <div class="profile-userpic">
                <img src="{{asset('assets/img/dp.jpg')}}" class="img-responsive" alt=""> </div>
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">Dr. Kiran Patel </div>
            <div class="profile-usertitle-job"> Gynaecologist </div>
        </div>
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Followers</b> <a class="pull-right">1,200</a>
            </li>
            <li class="list-group-item">
                <b>Following</b> <a class="pull-right">750</a>
            </li>
            <li class="list-group-item">
                <b>Friends</b> <a class="pull-right">11,172</a>
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
        $("#data").hide();
        $("#buttonDatatable").hide();

        $("#detail").on('click', function (e) {
            e.preventDefault();
            $("#data2").hide();
            $("#data").show();
            $("#detail").hide();
            $("#kembali").show();
            $("#title").html('Detail Guru');
        });
        $("#kembali").on('click', function (e) {
            e.preventDefault();
            $("#data2").show();
            $("#data").hide();
            $("#detail").show();
            $("#kembali").hide();
            $("#title").html('Filter Guru');
        });
    </script>

    @endpush
