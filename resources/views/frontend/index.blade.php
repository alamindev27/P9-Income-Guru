@extends('frontend.layouts.app')

@section('head')
    <title>Alamindev27</title>
@endsection

@section('content')
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
                <div class="user-icon me-2">
                    <img src="https://thimbles.devman07.com/img/icon/icon.png" alt="Logo"
                        class="rounded-circle bg-white " style="width: 35px; height: 35px;">
                </div>
                <span class="fw-bold" style="color: #FFD700; font-size: 1.1rem;">DevMan07</span>
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

    <section class="hero-banner" style="background-image: url('{{ asset('frontend/img/hero-bg.jpg') }}')">
        <div class="banner-overlay"></div>

        <div class="container h-100">
            <div class="row h-100 align-items-center text-center">
                <div class="col-md-10 offset-md-1">
                    <div class="hero-content">
                        <h1 class="hero-title fw-bold mb-3">
                            Revolutionizing <span class="highlight-text">Digital Futures</span>
                        </h1>

                        <p class="hero-description mx-auto mb-4">
                            Unlock the potential of modern web development with innovative solutions. We build scalable,
                            high-performance applications designed for tomorrow.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="prediction-section py-3">
        <div class="container text-center">

            <div class="d-flex justify-content-center gap-3 mb-4">
                <button class="btn btn-next-1 btn-sm">একাউন্ট খোলার জন্য Videos দেখুন</button>
            </div>

            <div class="intro-text mb-4">
                <small>Welcome to the ultimate Thimbles prediction experience. Use our advanced system to predict
                    outcomes
                    and maximize your winning potential.</small>
            </div>

            <div class="alert-box mb-3">
                <small><span class="text-warning">⚠️ Important:</span> You must register using one of the links below
                    and
                    deposit $20 to activate your promo code.</small>
            </div>

            <div class="promo-container mx-auto">


                <div class="row align-items-center mb-2 g-2">
                    <div class="col-lg-6">
                        <div class="promo-code-box d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <span class="hand-icon me-2">👉</span><img
                                    src="https://thimbles.devman07.com/img/bookmaker/megapari_gui.png" alt="">
                            </div>
                            <span>Promo code: <span class="code">DM1X2</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="promo-code-box d-flex align-items-center justify-content-between">
                            <div>
                                <span class="hand-icon me-2">👉</span><img
                                    src="https://thimbles.devman07.com/img/bookmaker/1xbet_gui.png" alt="">
                            </div>
                            <span>Promo code: <span class="code">DM1X2</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
                                </svg>
                            </span>
                        </div>
                    </div>

                </div>

            </div>

            <button class="btn btn-next mt-2">Next</button>

        </div>
    </section>
@endsection
