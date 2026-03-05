@extends('frontend.layouts.app')

@section('head')
    <link rel="preload" as="image" href="{{ asset($banner->image) }}">
@endsection

@section('content')
    <section class="hero-banner" style="background-image: url('{{ asset($banner->image) }}')">
        <div class="banner-overlay"></div>

        <div class="container h-100">
            <div class="row h-100 align-items-center text-center">
                <div class="col-md-10 offset-md-1">
                    <div class="hero-content">
                        <h1 class="hero-title fw-bold mb-3">
                            {{ $banner->heading_1 }} <span class="highlight-text">{{ $banner->heading_2 }}</span>
                        </h1>
                        <p class="hero-description mx-auto mb-4">{{ $banner->short_description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="prediction-section py-3">
        <div class="container text-center">

            <div class="d-flex justify-content-center gap-3 mb-4">
                <a href="{{ route('frontend.videos') }}" class="btn btn-next-1 btn-sm">একাউন্ট খোলার জন্য Videos দেখুন</a>
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
                    @forelse ($promos as $item)
                        <div class="col-lg-6">
                            <div class="promo-code-box d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span class="hand-icon me-2">👉</span>
                                    <a href="{{ $item->link }}" target="_blank" title="{{ $item->name }}">
                                        <img src="{{ asset($item->icon) }}" alt="">
                                    </a>
                                </div>
                                <span>Promo code: <span class="code">{{ $item->promo_code }}</span>
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
                    @empty
                        <div class="col-12">
                            <div class="alert alert-bg-color mb-0">No promo codes available at the moment. Please check back later.</div>
                        </div>
                    @endforelse


                    {{-- <div class="col-lg-6">
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
                    </div> --}}

                </div>

            </div>

            <button class="btn btn-next mt-2">Next</button>

        </div>
    </section>
@endsection
