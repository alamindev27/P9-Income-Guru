<nav class="top-bar">
    <div class="container-fluid d-flex justify-content-between align-items-center py-3 px-4">
        <!-- <div class="top-bar-left">
                    <a href="#" class="text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-send-fill" viewBox="0 0 16 16">
                            <path
                                d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.001.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                        </svg>
                    </a>
                </div> -->

        <div class="top-bar-center d-flex align-items-center">
            <a href="{{ route('frontend.index') }}" class="user-icon me-2">
                <img src="{{ asset(setting()->logo) }}" alt="{{ setting()->site_name }}" class="rounded-circle bg-white " style="width: 35px; height: 35px;">
            </a>
            <a href="{{ route('frontend.index') }}" class="fw-bold text-decoration-none" style="color: #FFD700; font-size: 1.1rem;">{{ setting()->site_name }}</a>
        </div>

        <div class="top-bar-right">
            <div class="dropdown">
                <button class="btn btn-outline-light dropdown-toggle btn-sm rounded-pill px-3" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    🇺🇸 English
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">

                    <li><span style="cursor: pointer;" class="dropdown-item">🇺🇸 English</span></li>
                    <li><span style="cursor: pointer;" class="dropdown-item">🇸🇦 العربية</span></li>
                    <li><span style="cursor: pointer;" class="dropdown-item">🇫🇷 Français</span></li>
                    <li><span style="cursor: pointer;" class="dropdown-item">🇮🇳 हिन्दी</span></li>
                    <li><span style="cursor: pointer;" class="dropdown-item">🇪🇸 Español</span></li>
                    <li><span style="cursor: pointer;" class="dropdown-item">🇩🇪 Deutsch</span></li>
                    <li><span style="cursor: pointer;" class="dropdown-item">🇵🇹 Português</span></li>
                    <li><span style="cursor: pointer;" class="dropdown-item">🇮🇹 Italiano</span></li>
                    <li><span style="cursor: pointer;" class="dropdown-item">🇧🇩 বাংলা</span></li>
                    <li><span style="cursor: pointer;" class="dropdown-item">🇹🇿 Kiswahili</span></li>
                    <li><span style="cursor: pointer;" class="dropdown-item">🇹🇷 Türkçe</span></li>
                    <li><span style="cursor: pointer;" class="dropdown-item">🇷🇺 Русский</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom-border-gradient"></div>
</nav>
