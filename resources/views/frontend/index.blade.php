@extends('frontend.layouts.app')
@section('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/index.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row align-items-center">

            <div class="col-12">
                <div class="text-white mt-3 bg-dark rounded py-2 ">
                    <marquee behavior="scroll" direction="left"
                        class="fw-bold d-flex justify-content-center align-items-center"
                        style="font-family: 'Hind Siliguri', sans-serif !important;">
                        {{ $intro->animated_text }}
                    </marquee>
                </div>
            </div>
        </div>

        <div class="row align-items-center py-3">
            <div class="col-2 text-start me-0 pe-0">
                <img src="{{ asset(setting()->logo) }}" alt="{{ setting()->site_name }}" class="img-fluid rounded-circle" style=" max-width: 50px; max-height: 50px;">
            </div>
            <div class="col-8 text-center mx-auto px-0">
                <div class="bengali-text">{{ $intro->heading_1 }}</div>
                <div class="amount-text">{{ $intro->heading_2 }}</div>
            </div>
            <div class="col-2 text-end ms-0 ps-0">
                <span class="text-white" style="width: 20px; font-size: 35px;">&equiv;</span>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-12 col-lg-6 mx-auto">
                <img src="{{ asset($intro->image) }}" alt="" class="img-fluid w-100"
                    style="border: 2px solid #3498db; border-radius: 10px;">
            </div>

            <div class="col-12 text-center mt-3 mx-auto">

                <button class="claim-btn" data-bs-toggle="modal" data-bs-target="#registrationModal">
                    Claim Today's Free Multi 🔥
                </button>
                <a href="{{ $intro->winning_link }}" target="_blank" class="footer-link">Previous উইনিং প্রুফ চেক করুন</a>

            </div>

            <div class="col-12 text-center mt-2">


                <div class="proof-card p-2">
                    <div class="text-center">
                        <div class="d-flex justify-content-center">
                            @if (isset(setting()->voice) && file_exists(public_path(setting()->voice)))
                                <div>
                                    <audio controls
                                        style="border: 2px solid #3498db; border-radius: 30px; box-shadow: 0 0 35px rgba(0, 210, 255, 0.6);">
                                        <source src="{{ asset(setting()->voice) }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            @endif
                        </div>
                        <small class=" mb-0 text-danger" style="font-size: 0.9rem; ">
                            <i>বিস্তারিত জানে সম্পূর্ণ ভয়েজ টি শুনুন</i>
                        </small>
                    </div>
                </div>

            </div>

            <div class="col-12 text-center mt-3 mx-auto">
                <div class="timer-box" id="timerContainer" data-id="{{ setting()->updated_at }}">
                    <div class="time-unit"><span class="green-num" id="hours">{{ setting()->timer['hours'] }}</span> Hrs
                    </div>
                    <div class="timer-divider">|</div>
                    <div class="time-unit"><span class="purple-num" id="minutes">{{ setting()->timer['minutes'] }}</span>
                        Min</div>
                    <div class="timer-divider">|</div>
                    <div class="time-unit"><span class="yellow-num" id="seconds">{{ setting()->timer['seconds'] }}</span>
                        Sec</div>
                </div>
            </div>
        </div>

        <div class="col-12 text-center mt-3 mx-auto">
            <p class="text-white mb-2">একাউন্ট খোলার Tutorials দেখুন</p>
            <div class="text-center">
                <button class="watch-btn" onclick="return window.location.href='{{ route('frontend.videos') }}'">
                    <span class="icon">▶</span>
                    Watch Now
                </button>
            </div>
        </div>

        <div class="col-12 text-center mt-3 mx-auto">

            <div class="proof-card p-2">
                @forelse ($promos as $item)
                    <div class="result-row d-flex justify-content-between gap-2 align-items-center px-2">
                        <span class="day-text d-flex justify-content-start gap-3 align-items-center">
                            <a href="{{ $item->link }}" target="_blank" title="{{ $item->name }}">
                                <img src="{{ asset($item->icon) }}" alt="" class="img-fluid rounded-circle"
                                    style="vertical-align: middle; box-shadow:0px 0px 15px 0px #3498db" width="40"
                                    height="40">
                            </a>
                            <span class="day-text fw-bold" style="font-size: 17px;">Promo Code - </span>
                        </span>
                        <span class="win-text">
                            <span class="d-flex justify-content-end gap-1 align-items-center">
                                <span style="color:#ffd700; font-size:21px;">{{ $item->promo_code }}</span>
                                <span class="copy-wrapper" onclick="copyToClipboard('{{ $item->promo_code }}', this)">
                                    <span class="copy-tooltip">Copied!</span>
                                    <span class="copy-btn" style="cursor: pointer;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                            <path
                                                d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                                            <path
                                                d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
                                        </svg>
                                    </span>
                                </span>
                            </span>
                        </span>
                    </div>
                @empty
                    <div class="col-12 mt-4 mx-auto">
                        <div class="alert alert-info mb-0 text-dark">No promo codes available at the moment.</div>
                    </div>
                @endforelse
            </div>

        </div>

        <div class="col-12 text-center mt-3 mx-auto">

            <div class="entry-count">
                Only 50 Free Entries Today! <span class="pink-text">(28 Left)</span>
            </div>

            <div class="step-container">
                <div class="step-box">
                    <div class="step-title step-1-color">Step 1</div>
                    <div class="step-icon">📇</div>
                    <div class="step-desc"><span class="yellow-highlight">1</span> Sign Up</div>
                </div>
                <div class="step-box">
                    <div class="step-title step-2-color">Step 2</div>
                    <div class="step-icon">💼</div>
                    <div class="step-desc"><span class="yellow-highlight">2</span> Deposit</div>
                </div>
                <div class="step-box">
                    <div class="step-title step-3-color">Step 3</div>
                    <div class="step-icon">⚽</div>
                    <div class="step-desc">Get Free Multi</div>
                </div>
            </div>

        </div>

        <div class="col-12 text-center mt-3 mx-auto">

            <div class="proof-card p-2">
                <div class="proof-title">Proof Your Bankroll in <span class="yellow-highlight">3 Easy</span>
                </div>

                @foreach ($proofs as $item)
                    <div class="result-row">
                        <span class="day-text">🕒 {{ $item->time }}:</span>
                        @if ($item->status == 'WIN')
                            <span class="win-text">WIN <span class="status-icon win-icon">✔</span>
                            @elseif ($item->status == 'LOSS' || $item->status == 'DRAW')
                                <span class="loss-text">LOSS <span class="status-icon loss-icon">✖</span>
                        @endif
                        </span>
                    </div>
                @endforeach
            </div>

        </div>

        <div class="col-12 text-center mt-3 mx-auto">
            <div class="proof-card p-2">
                <div class="proof-title">Our Member and <span class="yellow-highlight">Winning Amount</span> </div>
                <div class="stats-container">
                    <div class="stat-row">
                        <div class="d-flex justify-content-start align-items-center">
                            <span class="stat-value yellow-text counter"
                                data-target="{{ setting()->total_members }}">0</span>
                            <span class="stat-value yellow-text">+</span>
                        </div>
                        <span class="divider-line">|</span>
                        <span class="stat-label">Total Members</span>
                    </div>
                    <div class="stat-row">
                        <div class="d-flex justify-content-start align-items-center">
                            <span class="stat-value green-text">Tk. </span><span class="stat-value green-text counter"
                                data-target="{{ setting()->total_won }}">0</span><span
                                class="stat-value green-text">+</span>
                        </div>
                        <span class="divider-line">|</span>
                        <span class="stat-label">Total Won</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 text-center mt-3 mx-auto">

            <div class="badge-container">
                <div class="badge-icon-circle">#1</div>
                <div class="badge-text">
                    <div class="badge-text-top">Bangladesh #1 Free Multi</div>
                    <div class="badge-text-bottom">Community 💸 🔥</div>
                </div>
            </div>

        </div>

        <div class="col-12 text-center mt-3 mx-auto">

            <button class="final-claim-btn" data-bs-toggle="modal" data-bs-target="#registrationModal">
                <span>🔥</span> Claim Now Free
            </button>
        </div>

        <div class="col-12 mt-4">
            <div class="proof-card p-2">
                <div class="proof-title mb-3 text-center">Winning <span class="yellow-highlight">Screenshots</span></div>

                <div id="screenshotSlider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($reviews as $item)
                            <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}"
                                data-description="{{ $item->description }}" data-img-url="{{ asset($item->image) }}"
                                onclick="openProofModal(this)" style="cursor: pointer;">
                                <div class="review-box text-center p-2">
                                    <p class="review-short-text">
                                        "{{ \Illuminate\Support\Str::limit($item->description, 50) }}"</p>
                                    <div class="screenshot-wrapper">
                                        <img src="{{ asset($item->image) }}" class="img-fluid rounded shadow-sm"
                                            alt="Proof 1">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#screenshotSlider"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon small-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#screenshotSlider"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon small-icon"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="proofModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content"
                    style="background: #0a1e2e; border: 1.5px solid #1a5a8a; border-radius: 20px; overflow: hidden;">

                    <div class="modal-header border-0 pb-0">
                        <p class="modal-title text-warning w-100 text-justify" id="modalText"
                            style="text-align: justify; text-align-last: justify; margin-bottom: 10px;">Winning Proof</p>
                    </div>

                    <div class="modal-body text-center pt-2">
                        <div class="modal-img-container">
                            <img src="" id="modalImage" class="img-fluid rounded shadow-lg border"
                                style="max-height: 70vh; border: 1px solid #222;">
                        </div>
                    </div>

                    <div class="modal-footer border-0 d-flex justify-content-center pt-0 pb-4">
                        <button type="button" class="btn btn-close-custom" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 text-center mt-3 mx-auto">
            <div class="proof-card p-2">
                <div class="proof-title">Join Our Official <span class="yellow-highlight">Teligram Chanel</span> </div>
                <div class="stats-container">
                    <a href="{{ social()->link }}" title="{{ social()->name }}">{!! social()->icon !!}</a>
                </div>
            </div>
        </div>

        <div class="modal fade" id="registrationModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal-bg">
                    <div class="modal-body text-center p-5">
                        <h4 class="modal-title-custom mb-3">Registration Check</h4>
                        <p class="modal-text-custom mb-4">Did you register through one of the links?</p>

                        <div class="d-flex justify-content-center gap-3">
                            <button onclick="return window.location.href='{{ route('frontend.verify.player') }}'"
                                class="btn-modal btn-yes d-flex align-items-center justify-content-center">
                                <span class="me-2">✅</span> Yes
                            </button>
                            <button class="btn-modal btn-no d-flex align-items-center justify-content-center"
                                data-bs-dismiss="modal">
                                <span class="me-2">❌</span> No
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <br><br>
@endsection
@section('footer')
    <script src="{{ asset('frontend/js/index.js') }}"></script>
    <script>
        function openProofModal(el) {
            // Modal er content update kora
            document.getElementById('modalText').innerText = el.getAttribute('data-description');
            document.getElementById('modalImage').src = el.getAttribute('data-img-url');

            // Bootstrap Modal open kora
            var myModal = new bootstrap.Modal(document.getElementById('proofModal'));
            myModal.show();
        }
    </script>
@endsection
