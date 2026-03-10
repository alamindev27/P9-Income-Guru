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

        /* পপআপের জন্য কাস্টম স্টাইল */
        .custom-modal-bg {
            background: #121212 !important;
            /* ডার্ক ব্যাকগ্রাউন্ড */
            border: 2px solid #00d2ff !important;
            /* সায়ান বর্ডার গ্লো */
            border-radius: 20px !important;
            box-shadow: 0 0 25px rgba(0, 210, 255, 0.3);
        }

        .modal-title-custom {
            font-weight: bold;
            text-shadow: 0 0 10px rgba(255, 77, 77, 0.2);
        }

        .modal-text-custom {
            color: #eeeeee;
        }

        .btn-modal {
            padding: 10px 25px;
            border-radius: 10px;
            border: none;
            color: white;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-modal:hover {
            transform: scale(1.02);
            filter: brightness(1.2);
        }

        /* ব্যাকড্রপ ব্লার (ঐচ্ছিক) */
        .modal-backdrop.show {
            backdrop-filter: blur(8px);
            background-color: rgba(0, 0, 0, 0.85);
        }

        .promo-code-box {
            border-radius: 25px;
        }

        .promo-code-box img {
            width: 100%;
            height: 50px;
            object-fit: contain;
            margin-right: 0px;
        }
    </style>

    <link rel="preload" as="image" href="{{ asset('frontend/img/click-button.png') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-title-glow my-3 text-center">সঠিক ভাবে প্রমোকোড ব্যাবহার করে একাউন্ট অপেন না করলে মাল্টির কোড আসবে না!</h2>

                <div class="alert alert-bg-color">
                    <marquee behavior="scroll" direction="" class="text-white py-0 fw-bold" style="font-size: 17px;">অবশ্যই আপনার খুলা একাউন্ট টি ভেরিফাইড থাকতে হবে এবং মিনিমাম ১০০০ টাকা ডিপোজিট করতে হবে</marquee>
                </div>
            </div>


            @forelse ($datas as $item)
                <div class="col-lg-6 mt-3">
                    <img src="{{ $item->banner_image ? asset($item->banner_image) : 'https://placehold.co/708x310?text=' . $item->name . '  ' }}"
                        alt="{{ $item->name }}" class="img-fluid rounded border mb-3">
                    <div class="promo-code-box d-flex align-items-center justify-content-between text-center gap-1" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#promoErrorModal">
                        <div class="text-center mx-auto">
                            <img src="{{ asset($item->icon) }}" alt="{{ $item->name }}" style="" class="img-fluid">
                        </div>
                        <p class="text-nowrap mb-0 fw-bold" style="font-size: 20px;">Get Code</p>
                        <div class="text-center mx-auto">
                            <img src="{{ asset('frontend/img/click-button.png') }}" alt="{{ $item->name }}" class="img-fluid">
                        </div>
                    </div>
                    <hr class="text-white mt-4">
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-bg-color mb-0">No promo codes available at the moment.</div>
                </div>
            @endforelse




            <div class="modal fade" id="promoErrorModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content custom-modal-bg">
                        <div class="modal-body text-center p-5">
                            <div class="mb-3">
                                <span style="font-size: 50px;">⚠️</span>
                            </div>

                            <h3 class="modal-title-custom mb-3" style="color: #ff4d4d;">দুঃখিত!</h3>

                            <p class="modal-text-custom mb-4" style="font-size: 1.1rem; line-height: 1.6;">
                                আপনি সঠিক ভাবে প্রমোকোড ব্যবহার করে একাউন্ট রেজিষ্ট্রেশন করেন নি। আবার একাউন্ট খুলে চেস্টা
                                করুন।
                            </p>

                            <div class="d-flex justify-content-center">
                                <button class="btn-modal btn-no w-100" data-bs-dismiss="modal"
                                    style="background: linear-gradient(145deg, #ff4d4d, #a71d2a);">
                                    বন্ধ করুন
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



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
