@extends("layouts.admin-panel")
@section("style")
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}">

@endsection
@section("content")
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card table-responsive">
                    <div class="card-body">
                        <h4 class="card-title">Eğitim Listesi</h4>
                        <table class="table table-striped">
                            <thead>

                            <tr>
                                <th> Social Media Name </th>
                                <th> Link </th>
                                <th> Icon </th>
                                <th> Status </th>
                                <th> Order </th>
                                <th> Actions </th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($list as $item)
                            <tr id="{{ $item->id }}">
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->link }} </td>
                                <td>@foreach($icons as $value)
                                        {!!   ($item->icon_id) == ($value->id) ? $value->icon_class : "" !!}
                                    @endforeach
                                </td>

                                <td>
                                    @if($item->status)
                                        <a data-id="{{ $item->id }}" href="javascript:void(0)" class="btn btn-success btnChangeStatus">Aktif</a>
                                    @else
                                        <a data-id="{{ $item->id }}" href="javascript:void(0)" class="btn btn-danger btnChangeStatus">Pasif</a>

                                    @endif
                                   </td>
                                <td> {{ $item->order }} </td>
                                <td>
                                    <div class="d-flex">
                                        <a data-id="{{ $item->id }}" href="{{ route("social-media.edit", ['socialMedia' => $item->id]) }}"
                                           class="btn btn-warning btn-sm btnEdit">
                                            <i class="fa fa-pencil ms-0"></i>
                                        </a>
                                     <a data-id="{{ $item->id }}" href="javascript:void(0)"
                                                 class="btn btn-danger btn-sm btnDelete "
                                                 data-name="{{ $item->name }}"
                                                 data-id="{{ $item->id }}">
                                            <i class="fa fa-trash ms-0"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
@endsection

@section("js")
    <script src="{{ asset("assets/plugins/flatpickr/flatpickr.js") }}"></script>
    <script src="{{ asset("/vendor/laravel-filemanager/js/stand-alone-button.js") }}"></script>

    <script>


        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                }
            });

            $('.btnChangeStatus').click(function () {
                let socialMediaID = $(this).data('id');
                let self = $(this);
                Swal.fire({
                    title: 'Status değiştirmek istediğinize emin misiniz?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    denyButtonText: `Hayır`,
                    cancelButtonText: "İptal"
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed)
                    {
                        $.ajax({
                            method: "POST",
                            url: "{{ route('socialMedia.changeStatus') }}",
                            data: {
                                socialMediaID : socialMediaID
                            },
                            headers:{
                                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr("content")
                            },
                            async:false,
                            success: function (data) {
                                if(data.social_media_status)
                                {
                                    self.removeClass("btn-danger");
                                    self.addClass("btn-success");
                                    self.text("Aktif");
                                }
                                else
                                {
                                    self.removeClass("btn-success");
                                    self.addClass("btn-danger");
                                    self.text("Pasif");
                                }

                                Swal.fire({
                                    title: "Başarılı",
                                    text: "Status Güncellendi",
                                    confirmButtonText: 'Tamam',
                                    icon: "success"
                                });
                            },
                            error: function (){

                            }
                        })
                    }
                    else if (result.isDenied)
                    {
                        Swal.fire({
                            title: "Bilgi",
                            text: "Herhangi bir işlem yapılmadı",
                            confirmButtonText: 'Tamam',
                            icon: "info"
                        });
                    }
                })

            });

            $('.btnDelete').click(function () {
                let socialMediaID = $(this).data('id');

                Swal.fire({
                    title: 'Bu Sosyal Medya bilgisini silmek istediğinize emin misiniz?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    denyButtonText: `Hayır`,
                    cancelButtonText: "İptal"
                }).then((result) =>
                {
                    if (result.isConfirmed)
                    {
                        $.ajax({
                            url: "{{ route('social-media.delete') }}",
                            // method: "POST"
                            type: "POST",
                            async: false,
                            data: {
                                socialMediaID: socialMediaID
                            },
                            success: function (response)
                            {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Başarılı !',
                                    text: "Silme işlemi başarılı.",
                                    confirmButtonText: "Tamam"
                                });
                                $("tr#" + socialMediaID).remove();
                            },
                            error: function ()
                            {
                            }
                        });
                    }
                    else if (result.isDenied)
                    {
                        Swal.fire({
                            title: "Bilgi",
                            text: "Herhangi bir işlem yapılmadı",
                            confirmButtonText: 'Tamam',
                            icon: "info"
                        });
                    }
                })

            });


        });

    </script>

@endsection
