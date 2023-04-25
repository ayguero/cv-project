@extends("layouts.admin-panel")
@section("style")
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}">
@endsection
@section("content")
    <div class="card">
        <div class="card-body">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            <h4 class="card-title">Kullanıcı {{ isset($user) ? "Güncelleme" : "Ekleme" }}</h4>
            <form class="forms-sample" id="userForm"
                  action="{{ isset($user) ? route('user.edit',['user'=>$user->id]) : route('user.create') }}"
                  METHOD="post">
                @csrf
                <div class="form-group">
                    <label for="name">Ad Soyad</label>
                    <input type="text"
                           class="form-control"
                           id="name"
                           name="name"
                           placeholder="Name"
                           value="{{ isset($user) ? $user->name : "" }}"
                    >
                </div>
                <div class="form-group">
                    <label for="email">Email Adresi</label>
                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           placeholder="Email"
                           value="{{ isset($user) ? $user->email : "" }}"
                    >
                </div>
                <div class="form-group">
                    <label for="password">Parola</label>
                    <input type="password"
                           class="form-control"
                           id="password"
                           name="password"
                           placeholder="Parolanız"
                           value=""
                    >
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Telefon Numarası</label>
                    <input type="text"
                           class="form-control"
                           id="phoneNumber"
                           name="phone_number"
                           placeholder="Telefon Numaranız"
                           value="{{ isset($user) ? $user->phone_number : "" }}"
                    >
                </div>
                <div class="form-group">
                    <label for="website">Websitesi</label>
                    <input type="text"
                           class="form-control"
                           id="website"
                           name="website"
                           placeholder="websiteniz"
                           value="{{ isset($user) ? $user->website : "" }}"
                    >
                </div>
                <div class="form-group">
                    <label for="birthday">Doğum Günü Tarihi</label>
                    <input type="text"
                           class="form-control flatpickr2"
                           name="birthday"
                           id="birthday"
                           placeholder="GG/AA/Y"
                           value="{{ isset($user) ? $user->birthday : "" }}"
                    >
                </div>
                <div class="form-group">
                    <label for="job">Meslek</label>
                    <input type="text"
                           class="form-control"
                           id="job"
                           name="job"
                           placeholder="Mesleğiniz/Ünvanınız"
                           value="{{ isset($user) ? $user->job : "" }}"
                    >
                </div>
                <div class="form-group">
                    <label for="resume">Özgeçmiş</label>
                    <textarea class="form-control"
                              id="resume"
                              name="resume"
                              rows="2"
                    >
                        {!! isset($user) ? $user->resume : "" !!}
                    </textarea>
                </div>

                <div class="form-group">
                    <label>Profil Resmi</label>
                    <div class="row">
                        <div class="input-group-append col-xs-12 col-8 d-block ">
                            <div class="d-flex mt-4">
                                <button id="profileImage" data-input="thumbnail"
                                        data-preview="holder"
                                        class="file-upload-browse btn btn-info " type="button">Yükle</button>
                                <input type="text" id="thumbnail" name="profile_image" class="form-control file-upload-info"
                                       placeholder="Profil Resmi Yükle" value="{{ isset($user) ? $user->profile_image : "" }}">
                            </div>

                        </div>
                        <div class="col-4 ">
                            <img class="img-lg rounded-circle" id="image" src="{{ auth()->user()->profile_image }}" alt="Profile image">
                    </div>

                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Adres Bilgileri</label>
                    <textarea class="form-control"
                              id="address"
                              name="address"
                              rows="2"
                    >
                        {!! isset($user) ? $user->address : "" !!}
                    </textarea>
                </div>

                <div class="form-group">
                    <label>CV Yükle</label>
                    <div class="row">
                        <div class="input-group-append col-xs-12 col-8 d-block ">
                            <div class="d-flex mt-4">
                                <button id="cv" data-input="cvPdf"
                                        data-preview="holder"
                                        class="file-upload-browse btn btn-info " type="button">Yükle</button>
                                <input type="text" id="cvPdf" name="cv" class="form-control file-upload-info"
                                       placeholder="CV Yükle" value="{{ isset($user) ? $user->cv : "" }}">
                            </div>

                        </div>
                        <div class="col-4 ">
                            <iframe height="200px" width="100%" id="cvResume" src="{{ auth()->user()->cv }}" alt="CV">

                            </iframe>
                        </div>

                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="1"
                           id="status" {{ isset($user) && $user->status  ? "checked" : "" }}>
                    <label class="form-check-label" for="status">
                        Kullanıcı Durumu Aktif Olsun mu?
                    </label>
                </div>

                <button type="button" class="btn btn-success mr-2"
                        id="btnSave">{{ isset($user) ? "Güncelle" : "Kaydet" }}</button>
            </form>
        </div>
    </div>
@endsection

@section("js")
    <script src="{{ asset("assets/plugins/flatpickr/flatpickr.js") }}"></script>
    <script src="{{ asset("/vendor/laravel-filemanager/js/stand-alone-button.js") }}"></script>

    <script>
        $("#birthday").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    </script>
    <script>
        let name = $('#name');
        let email = $('#email');
        let password = $('#password');
        let phoneNumber = $('#phoneNumber');
        let job = $('#job');

        $(document).ready(function () {
            $('#btnSave').click(function () {
                if (name.val().trim() === "" || name.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Ad soyad alanı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (email.val().trim() === "" || email.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Kullanıcı email alanı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                }
                @if(!isset($user))
                    else if (password.val().trim() === "" || password.val().trim() == null) {
                        Swal.fire({
                            title: "Uyarı",
                            text: "Kullanıcı parola alanı boş geçilemez",
                            confirmButtonText: 'Tamam',
                            icon: "info"
                        });
                    }
                @endif
                else if (phoneNumber.val().trim() === "" || phoneNumber.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Kullanıcı telefon numarası alanı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (job.val().trim() === "" || job.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Kullanıcı meslek alanı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else {
                    $("#userForm").submit();
                }
            });
        });

        $('#profileImage').filemanager('image');
        $('#cv').filemanager('cv');
        $('#thumbnail').change(function () {
            $('#image').attr("src", $(this).val());
        });
        $('#cvPdf').change(function () {
            $('#cvResume').attr("src", $(this).val());
        });

    </script>

@endsection
