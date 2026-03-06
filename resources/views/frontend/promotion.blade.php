@extends('frontend.layouts.app')
@section('head')
    <style>
        .section-title-glow {
            color: var(--deep-color);
            font-size: 2rem;
            font-weight: 800;
            text-shadow: 0 0 15px rgba(0, 210, 255, 0.6);
        }

        .alert {
            padding: 0.5rem
        }

        .copy-wrapper {
            position: relative;
            display: inline-block;
        }

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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-title-glow my-3 text-center">Here will be the promotion heading</h2>

                <div class="alert alert-bg-color">
                    <marquee behavior="scroll" direction="" class="text-white py-0 fw-bold" style="font-size: 17px;">No promo
                        codes available at the moment.</marquee>
                </div>
            </div>


            @forelse ($promos as $item)
                <div class="col-lg-6 mt-3">
                    <img src="{{ asset('frontend/img/1xbet.webp') }}" alt="" class="img-fluid rounded border mb-3">

                    <div class="promo-code-box d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <a href="{{ $item->link }}" target="_blank" title="{{ $item->name }}">
                                <img src="{{ asset($item->icon) }}" alt="">
                            </a>
                        </div>

                        <span>Multi Ods:
                            <span class="code" id="code-{{ $loop->index }}">84.50</span>

                            <span class="copy-wrapper" onclick="copyToClipboard('84.50', this)">
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
                    <hr class="text-white mt-4">
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-bg-color mb-0">No promo codes available at the moment.</div>
                </div>
            @endforelse
            {{-- <div class="col-lg-6 mt-3">
                <img src="{{ asset('frontend/img/megapari.webp') }}" alt="" class="img-fluid rounded border">
            </div> --}}


        </div>
    </div>
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
