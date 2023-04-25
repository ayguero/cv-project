<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="{{ route("home")  }}" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="{{ auth()->user()->profile_image }}" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name text-center">{{ auth()->user()->name }}</p>
                    <p class="designation">{{ auth()->user()->job }}</p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Kontrol Paneli</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.edit', ['user' => auth()->user()->id]) }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Kullanıcı Düzenle</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Eğitim</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("education.create") }}">Eğitim Ekle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("education.list") }}">Eğitim Listesi</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#experience" aria-expanded="false" aria-controls="experience">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Deneyim</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="experience">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("experience.create") }}">Deneyim Ekle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("experience.list") }}">Deneyim Listesi</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#socialmedia" aria-expanded="false" aria-controls="socialmedia">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Sosyal Medya Hesapları</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="socialmedia">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("social-media.create") }}">Sosyal Medya Ekle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("social-media.list") }}">Sosyal medya Listesi</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#portfolio" aria-expanded="false" aria-controls="portfolio">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Portföy</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="portfolio">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portfolio.create') }}">Portföy Ekle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portfolio.list') }}">Portföy Listesi</a>
                    </li>
                </ul>
            </div>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('contact-list') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">iletişim Formları</span>
            </a>
        </li>

    </ul>
</nav>
