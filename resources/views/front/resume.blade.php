@extends("layouts.front")
@section("style")
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"
          rel="stylesheet"  type='text/css'>
@endsection
@section("title")
    CV Özgeçmiş
@endsection
@section("content")
    <section class="resume-section">
        <div class="row">
            <div class="col-lg-6">
                <h6 class="section-subtitle">ÖZGEÇMİŞ</h6>
                <h2 class="section-title">EĞİTİM</h2>
                <ul class="time-line">
                    @foreach($education as $value)
                        <li class="time-line-item">
                            <span class="badge badge-primary">{{ $value->education_year }}</span>
                            <h6 class="time-line-item-title">{{ $value->school_name }}</h6>
                            <p class="time-line-item-subtitle">{{ $value->department }}</p>
                            <p class="time-line-item-content">{{ $value->description }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <h6 class="section-subtitle">ÖZGEÇMİŞ</h6>
                <h2 class="section-title">Deneyim</h2>
                <ul class="time-line">
                    @foreach($experience as $info)
                        <li class="time-line-item">
                            <span class="badge badge-primary">{{ $info->date }}</span>
                            <h6 class="time-line-item-title">{{ $info->company_name }}</h6>
                            <p class="time-line-item-subtitle">{{ $info->task_name }}</p>
                            <p class="time-line-item-content">{{ $info->description }}</p>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </section>
    {{--<section class="clients-section">
        <h6 class="section-subtitle">WHAT I DO</h6>
        <h2 class="section-title">CLIENTS</h2>
        <div class="client-logos-wrapper">
            <div class="client-logo"><img src="assets/images/Clients_1.svg" alt="logo" class="w-100"></div>
            <div class="client-logo"><img src="assets/images/Clients_2.svg" alt="logo" class="w-100"></div>
            <div class="client-logo"><img src="assets/images/Clients_3.svg" alt="logo" class="w-100"></div>
            <div class="client-logo"><img src="assets/images/Clients_4.svg" alt="logo" class="w-100"></div>
        </div>
    </section>--}}
    <section class="services-section">
        <h6 class="section-subtitle">UZMANLIK ALANI</h6>
        <h2 class="section-title">YETENEKLER</h2>
        <div class="row">
            @foreach($ability as $info)
                <div class="media service-card col-lg-6">

                    <div class="service-icon">
                        <img src="{{ asset("assets/front/images/001-target.svg") }}" alt="target">
                    </div>
                    <div class="media-body">
                        <h5 class="service-title">{{ $info->title }}</h5>
                        <p class="service-description"> {{ $info->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section("js")
@endsection
