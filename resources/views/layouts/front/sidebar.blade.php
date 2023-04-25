<aside>
    @foreach($list as $item)
    <div class="profile-img-wrapper">
        <img src="{{$item->profile_image }}" alt="profile">
    </div>
    @endforeach
    <h1 class="profile-name">Aygün KEÇE</h1>
    <div class="text-center">
        <span class="badge badge-white badge-pill profile-designation">Full Stack Software Developer</span>
    </div>
    <div class="d-flex justify-content-center">
    @foreach($social as $media)
        <span class="social-links ">
            <a href="{{ $media->link }}" class="social-link bg-white">{!! $media->icons->icon_class  !!}</a>
        </span>
    @endforeach
    </div>
    <div class="widget">
      @foreach($list as $item)
        <h5 class="widget-title">Kişisel Bilgiler</h5>
        <div class="widget-content">
            <p>Doğum Günü : {{ \Carbon\Carbon::parse($item->birthday)->format("d-m-Y") }}</p>
            <p>Website  {{ $item->website }}:</p>
            <p>Telefon : {{ $item->phone_number }}</p>
            <p>EMail : {{ $item->email }}</p>
            <p>Adres : {{ $item->address }}</p>
            <a class="btn btn-download-cv btn-primary rounded-pill" id="cvDownload"
               href="{{ $item->cv }}" target="_blank"
            download="aygun_kece_cv.pdf">
                <img src="{{ asset("assets/front/images/download.svg") }}"
                     alt="download"
                     class="btn-img">CV İNDİR </a>
        </div>
        @endforeach
    </div>
</aside>
