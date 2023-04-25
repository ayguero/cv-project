@extends("layouts.admin-panel")
@section("style")
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}">
@endsection
@section("content")

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Sosyal Medya Bilgileri {{ isset($socialMedia) ? "Güncelleme" : "Ekleme" }}</h4>
            <form class="forms-sample" id="socialMediaForm"
                  action="{{ isset($socialMedia) ? route('social-media.edit', ['socialMedia'=> $socialMedia->id]) : route("social-media.create") }}"
                  method="POST">
                @csrf
                <div class="form-group">
                    <label for="socialMediaName">Sosyal Medya Adı</label>
                    <input type="text"
                           class="form-control"
                           id="socialMediaName"
                           name="name"
                           placeholder="Sosyal medya hesabınız"
                           value="{{ isset($socialMedia) ? $socialMedia->name : "" }}"
                    >
                    @error('name')
                    <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="link">Linki</label>
                    <input type="text"
                           class="form-control"
                           id="link"
                           name="link"
                           placeholder="Sosyal medya hesapbınızın linki"
                           value="{{ isset($socialMedia) ? $socialMedia->link : "" }}"
                    >
                    @error('link')
                    <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                <label>Icon</label>
                <select
                    class="form-select form-control form-control-solid-bordered m-b-sm"
                    aria-label="Icon Seçimi"
                    name="icon_id"
                >
                    <option value="{{ null }}">Icon Seçimi</option>
                    @foreach($icons as $item)
                        <option
                            value="{{ $item->id }}" {{ isset($socialMedia) && isset($item->icon_name) ? "selected" : "" }}>
                            {{ $item->icon_name }}
                        </option>
                    @endforeach
                </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="1"
                           id="status" {{ isset($socialMedia) && $socialMedia->status  ? "checked" : "" }}>
                    <label class="form-check-label" for="status">
                        Sosyal Medya sayfada gösterilsin mi?
                    </label>
                </div>

                <div class="form-group">
                    <label for="order">Sıralama</label>
                    <input type="text"
                           class="form-control"
                           id="order"
                           name="order"
                           placeholder="Listede gösterim sırası"
                           value="{{ isset($socialMedia) ? $socialMedia->order : "" }}"
                    >
                </div>

                    <button type="button" class="btn btn-success mr-2"
                            id="btnSave">{{ isset($socialMedia) ? "Güncelle" : "Kaydet" }}</button>
            </form>
        </div>
    </div>

@endsection

@section("js")
    <script src="{{ asset("assets/plugins/flatpickr/flatpickr.js") }}"></script>
    <script>
        let socialMediaName = $('#socialMediaName');
        let link = $('#link');
        let icon = $('#icon');

        $(document).ready(function () {
            $('#btnSave').click(function () {

                if (socialMediaName.val().trim() === "" || socialMediaName.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Sosyal medya adı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else if (link.val().trim() === "" || link.val().trim() == null) {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Link alanı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                } else {
                    $("#socialMediaForm").submit();
                }
            });
        });

    </script>

@endsection
