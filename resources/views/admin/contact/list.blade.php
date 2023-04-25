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
                                <th> Name </th>
                                <th> Email </th>
                                <th> Message </th>
                                <th> Created At </th>
                                <th> Updated At </th>
                                <th> Actions </th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($list as $item)
                            <tr id="{{ $item->id }}">
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->email }} </td>
                                <td>
                                    <span data-bs-container="body" data-toggle="tooltip" data-placement="top" title="{{ substr( $item->message , 0, 200) }}">
                                    {{substr( $item->message , 0 , 20)}}
                                </span>
                                </td>

                                <td> {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat("d-m-Y") }}  </td>
                                <td> {{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat("d-m-Y") }}  </td>
                                <td>
                                    <div class="d-flex">

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

            $('.btnDelete').click(function () {
                let contactID = $(this).data('id');

                Swal.fire({
                    title: 'Bu İletişim formunu silmek istediğinize emin misiniz?',
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
                            url: "{{ route('contact.delete') }}",
                            // method: "POST"
                            type: "POST",
                            async: false,
                            data: {
                                contactID: contactID
                            },
                            success: function (response)
                            {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Başarılı !',
                                    text: "Silme işlemi başarılı.",
                                    confirmButtonText: "Tamam"
                                });
                                $("tr#" + contactID).remove();
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
