@extends('frontend.layouts.app')

@section('head')
    <link rel="preload" as="image" href="{{ asset($banner->image) }}">
    <style>
        /* Social Media Section Styling */
        .social-media-section {
            background-color: var(--neutral-dark-color);
            /* YouTube pure dark mode background */
        }

        .social-card {
            display: block;
            text-align: center;
            padding: 30px 20px;
            background: var(--dark-gray-color);
            border-radius: 16px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid var(--deep-color);
        }

        .social-icon-box {
            font-size: 2.5rem;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .social-card h5 {
            color: var(--white-color);
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .social-card p {
            color: var(--deep-color);
            font-size: 0.85rem;
            margin: 0;
        }

        /* Hover Effects with Brand Colors */
        .social-card:hover {
            transform: translateY(-10px);
            border-color: var(--deep-color);
        }

        .social-icon-box {
            color: #aaa;
        }

        /* Brand Specific Colors on Hover */
        .telegram:hover .social-icon-box {
            color: #0088cc;
        }

        .youtube:hover .social-icon-box {
            color: #ff0000;
        }

        .facebook:hover .social-icon-box {
            color: #1877f2;
        }

        .instagram:hover .social-icon-box {
            color: #e4405f;
        }

        /* WhatsApp Hover Color */
        .whatsapp:hover .social-icon-box {
            color: #25D366;
        }

        /* Twitter (X) Hover Color */
        .twitter:hover .social-icon-box {
            color: #1DA1F2;
            /* Traditional Twitter Blue */
            /* Or use #FFFFFF if you want the new 'X' look on a dark background */
        }

        .social-card:hover h5 {
            color: var(--white-color);
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }

        /* Responsive Grid for Small Screens */
        @media (max-width: 576px) {
            .social-card {
                padding: 20px 10px;
            }

            .social-icon-box {
                font-size: 2rem;
            }
        }

        /* Tooltip wrapper */
        .copy-wrapper {
            position: relative;
            display: inline-block;
        }

        /* Tooltip text style */
        .copy-tooltip {
            visibility: hidden;
            width: 60px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 4px;
            padding: 3px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            /* Icon er upore show korbe */
            left: 50%;
            margin-left: -30px;
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 12px;
        }

        /* Tooltip er nicher chotto arrow */
        .copy-tooltip::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #333 transparent transparent transparent;
        }

        /* Show hole opacity barbe */
        .show-tooltip .copy-tooltip {
            visibility: visible;
            opacity: 1;
        }
    </style>
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

    <section class="prediction-section py-5">
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

                                <span>Promo code:
                                    <span class="code" id="code-{{ $loop->index }}">{{ $item->promo_code }}</span>

                                    <span class="copy-wrapper" onclick="copyToClipboard('{{ $item->promo_code }}', this)">
                                        <span class="copy-tooltip">Copied!</span>
                                        <span class="copy-btn" style="cursor: pointer;">
                                            {{-- Default Icon --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                                <path
                                                    d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                                                <path
                                                    d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
                                            </svg>
                                        </span>
                                    </span>
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-bg-color mb-0">No promo codes available at the moment.</div>
                        </div>
                    @endforelse
                </div>
            </div>
            <button class="btn btn-next mt-2">Next</button>
        </div>
    </section>

    <section class="social-media-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="section-title text-white fw-bold">Connect With Us</h3>
                {{-- <p class="text-secondary">Stay updated with our latest news and predictions on social media.</p> --}}
            </div>

            <div class="row g-4 justify-content-center">
                @foreach ($socials as $item)
                    <div class="col-6 col-md-3">
                        <a href="{{ $item->link }}" class="social-card {{ Str::slug($item->name) }}" target="_blank">

                            <div class="social-icon-box">
                                {!! $item->icon !!}
                            </div>
                            <h5>{{ $item->name }}</h5>
                            <p>{{ $item->subscriber }}</p>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection

@section('footer')
    <script>
        function copyToClipboard(text, element) {
            const originalIcon =
                `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16"><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/><path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/></svg>`;
            const successIcon =
                `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16"><path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708"/></svg>`;

            const btn = element.querySelector('.copy-btn');

            // Clipboard Copy Logic
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(showSuccess);
            } else {
                let textArea = document.createElement("textarea");
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.select();
                try {
                    document.execCommand('copy');
                    showSuccess();
                } catch (err) {}
                textArea.remove();
            }

            function showSuccess() {
                // Show Tooltip & Change Icon
                element.classList.add('show-tooltip');
                btn.innerHTML = successIcon;
                btn.style.color = "#28a745";

                // Reset after 1.5 seconds
                setTimeout(() => {
                    element.classList.remove('show-tooltip');
                    btn.innerHTML = originalIcon;
                    btn.style.color = "";
                }, 1500);
            }
        }
    </script>
@endsection
