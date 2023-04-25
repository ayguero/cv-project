@extends("layouts.admin-panel")
@section("style")
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}">
@endsection
@section("content")

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Deneyim Bilgileri {{ isset($experience) ? "Güncelleme" : "Ekleme" }}</h4>
            <form class="forms-sample" id="experienceForm"
                  action="{{ isset($experience) ? route('experience.edit', ['experience'=>$experience->id]) : route("experience.create") }}"
                  method="POST">
                @csrf
                <div class="form-group">
                    <label for="companyName">Eğitim Kurumu</label>
                    <input type="text"
                           class="form-control"
                           id="companyName"
                           name="company_name"
                           placeholder="Çalıştığınız firmanın adınıyazınız"
                           value="{{ isset($experience) ? $experience->company_name : "" }}"
                    >
                    @error('company_name')
                    <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="taskName">Bölümü</label>
                    <input type="text"
                           class="form-control"
                           id="taskName"
                           name="task_name"
                           placeholder="Firmadaki görevinizi yazınız"
                           value="{{ isset($experience) ? $experience->task_name : "" }}"
                    >
                    @error('task_name')
                    <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Yaptığınız iş hakkında</label>
                    <input type="text"
                           class="form-control"
                           id="description"
                           name="description"
                           placeholder="Kendinizi kısaca tanıtın"
                           value="{{ isset($experience) ? $experience->description : "" }}"
                    >
                    @error('description')
                    <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="date">Çalışma Süreniz</label>
                        <input type="text"
                               class="form-control"
                               id="date"
                               name="date"
                               placeholder="Çalışma Başlagıngıç - Bitiş Yılları"
                               value="{{ isset($experience) ? $experience->date : "" }}"
                        >
                        @error('date')
                        <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="1"
                           id="status" {{ isset($experience) && $experience->status  ? "checked" : "" }}>
                    <label class="form-check-label" for="status">
                        Çalışma deneyiminiz gösterilsin mi?
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="active" value="1"
                           id="active" {{ isset($experience) && $experience->active  ? "checked" : "" }}>
                    <label class="form-check-label" for="status">
                        Bu işte akfif olarak çalışıyor musunuz?
                    </label>
                </div>
                <div class="form-group">
                    <label for="order">Sıralama</label>
                    <input type="text"
                           class="form-control"
                           id="order"
                           name="order"
                           placeholder="Listede gösterim sırası"
                           value="{{ isset($experience) ? $experience->order : "" }}"
                    >

                    <button type="button" class="btn btn-success mr-2"
                            id="btnExperienceSave">{{ isset($experience) ? "Güncelle" : "Kaydet" }}</button>
            </form>
        </div>
    </div>

@endsection

@section("js")
    <script src="{{ asset("assets/plugins/flatpickr/flatpickr.js") }}"></script>
    <script>
        let companyName = $('#companyName');
        let taskName = $('#taskName');
        let date = $('#date');

        $(document).ready(function () {
            $('#btnExperienceSave').click(function () {

                 if (companyName.val().trim() === "" || companyName.val().trim() == null) {
                     Swal.fire({
                         title: "Uyarı",
                         text: "Firma Adı alanı boş geçilemez",
                         confirmButtonText: 'Tamam',
                         icon: "info"
                     });
                 } else if (taskName.val().trim() === "" || taskName.val().trim() == null) {
                     Swal.fire({
                         title: "Uyarı",
                         text: "Görev alanı boş geçilemez",
                         confirmButtonText: 'Tamam',
                         icon: "info"
                     });
                 } else if (date.val().trim() === "" || date.val().trim() == null) {
                     Swal.fire({
                         title: "Uyarı",
                         text: "Çalışma yılları alanı boş geçilemez",
                         confirmButtonText: 'Tamam',
                         icon: "info"
                     });
                 } else {
                     $("#experienceForm").submit();
                 }
            });
        });

    </script>

@endsection
