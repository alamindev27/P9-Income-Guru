@extends('frontend.layouts.app')
@section('head')
    <style>
        /* Info Selection Section Styles */
        .info-selection-section {
            color: var(--deep-color);
        }

        .section-title-glow {
            color: var(--deep-color);
            font-size: 2rem;
            font-weight: 800;
            text-shadow: 0 0 15px rgba(0, 210, 255, 0.6);
        }

        .step-label {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--deep-color);
        }

        /* Custom Input & Select Glow */
        .custom-input-glow {
            background-color: var(--neutral-dark-color) !important;
            border: 2px solid var(--deep-color) !important;
            border-radius: 12px !important;
            color: var(--white-color) !important;
            padding: 12px 20px;
            box-shadow: inset 0 0 10px rgba(0, 210, 255, 0.2);
        }

        .custom-input-glow::placeholder {
            color: var(--deep-color);
        }

        /* Copy/Clipboard Button */
        .btn-copy-icon {
            background: transparent;
            border: 2px solid var(--deep-color);
            border-radius: 12px;
            padding: 0 15px;
            color: var(--white-color);
            box-shadow: 0 0 10px rgba(0, 210, 255, 0.3);
        }

        .clipboard-emoji {
            font-size: 1.5rem;
        }

        /* Start Game Button Style */
        .btn-start-game {
            background: linear-gradient(180deg, #1e5e7b 0%, #0e3a4d 100%);
            border: none;
            padding: 15px 80px;
            border-radius: 50px;
            color: var(--white-color);
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0 0 25px rgba(0, 210, 255, 0.4);
            transition: 0.3s;
        }

        .btn-start-game:hover {
            transform: scale(1.05);
            box-shadow: 0 0 35px rgba(0, 210, 255, 0.6);
        }

        /* Bookmaker Logo Glow on Hover (Optional) */
        .bookmaker-logo {
            cursor: pointer;
            transition: 0.3s;
        }

        .bookmaker-logo:hover {
            filter: drop-shadow(0 0 10px #00d2ff);
        }

        .bookmaker-logo.active {
            filter: drop-shadow(0 0 10px #00d2ff);
        }








        .custom-input-glow:focus {
            box-shadow: 0 0 10px rgba(0, 210, 255, 0.5);
            background-color: #000;
            color: #fff;
        }

        .small {
            font-size: 0.8rem;
            margin-top: 4px;
        }

        .bookmaker-logo {
            transition: all 0.3s ease;
            opacity: 0.7;
        }

        .bookmaker-logo:hover {
            opacity: 1;
            transform: translateY(-2px);
        }
    </style>
@endsection
@section('content')
    <section class="info-selection-section py-3">
        <div class="container text-center">
            <div class="card" style="background: var(--medium-dark-color)">
                <div class="card-body pb-4">
                    <h2 class="section-title-glow mb-3">Select your infos</h2>
                    <form id="infoForm" action="{{ route('frontend.player.promotion') }}" method="POST">
                        @csrf
                        <input type="text" id="promo_id" name="promo_id" value="" hidden>

                        <div class="info-form-wrapper mx-auto text-start" style="max-width: 600px;">

                            <div class="info-step mb-3">
                                <h5 class="step-label">
                                    <span class="d-block">1. Select your bookmaker.</span>
                                    <small class="d-block">১) কোন সাইট এ একাউন্ট খুলেছেন?</small>
                                </h5>
                                <div class="row justify-content-center">
                                    @foreach ($datas as $item)
                                        <div class="col-6 col-md-3 bookmaker-logo text-center mt-3 px-1"
                                            onclick="setBookmarker('{{ $item->id }}', this)">
                                            <img src="{{ asset($item->icon) }}" alt="{{ $item->name }}" class="img-fluid"
                                                style="height: 40px; width:100%; object-fit: contain; cursor: pointer;">
                                        </div>
                                    @endforeach
                                </div>
                                <span id="promo_error" class="text-danger small" style="display:none;">❌ Please select a
                                    bookmaker</span>
                                @error('promo_id')
                                    <span class="text-danger small" style="display:block;">❌ {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="info-step mb-3">
                                <h5 class="step-label">
                                    <span class="d-block">2. Enter Player ID</span>
                                    <small class="d-block">২) প্লেয়ার একাউন্ট নাম্বার দিন</small>
                                </h5>
                                <div class="d-flex flex-column gap-1 mt-3">
                                    <div class="d-flex gap-2">
                                        <input type="text" id="player_id_input" class="form-control custom-input-glow"
                                            placeholder="Enter 10-digit ID (> 1419719000)" name="player_id" required
                                            autocomplete="off">
                                        <button type="button" class="btn-copy-icon">
                                            <span class="clipboard-emoji">📋</span>
                                        </button>
                                    </div>
                                    <span id="player_id_error" class="text-danger small"
                                        style="display:none; font-weight: 500;"></span>
                                    @error('player_id')
                                        <span class="text-danger small" style="display:block;">❌ {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="info-step mb-3">
                                <h5 class="step-label">
                                    <span class="d-block">3. Deposit Amount</span>
                                    <small class="d-block">৩) ডিপোজিট পরিমাণ দিন</small>
                                </h5>
                                <div class="d-flex flex-column gap-1 mt-3">
                                    <div class="d-flex gap-2">
                                        <input type="number" id="deposit_amount_input"
                                            class="form-control custom-input-glow" placeholder="Enter deposit amount"
                                            name="deposit_amount" required autocomplete="off">
                                    </div>
                                    <span id="deposit_amount_error" class="text-danger small"
                                        style="display:none; font-weight: 500;"></span>
                                    @error('deposit_amount')
                                        <span class="text-danger small" style="display:block;">❌ {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="info-step mb-3">
                                <h5 class="step-label">
                                    <span class="d-block">4. Select Server</span>
                                    <small class="d-block">৪) সার্ভার/দেশ সিলেক্ট করুন</small>
                                </h5>
                                <div class="mt-3">
                                    <select id="server_select" class="form-select custom-input-glow" name="server_name"
                                        required>
                                        <option value="" selected disabled>Select Server</option>
                                        <option value="dz">🇩🇿 Algeria</option>
                                        <option value="ao">🇦🇴 Angola</option>
                                        <option value="bj">🇧🇯 Benin</option>
                                        <option value="bw">🇧🇼 Botswana</option>
                                        <option value="bf">🇧🇫 Burkina Faso</option>
                                        <option value="bi">🇧🇮 Burundi</option>
                                        <option value="cm">🇨🇲 Cameroon</option>
                                        <option value="cv">🇨🇻 Cape Verde</option>
                                        <option value="cf">🇨🇫 Central African Republic</option>
                                        <option value="td">🇹🇩 Chad</option>
                                        <option value="km">🇰🇲 Comoros</option>
                                        <option value="cg">🇨🇬 Congo</option>
                                        <option value="cd">🇨🇩 Congo (Democratic Republic)</option>
                                        <option value="ci">🇨🇮 Côte d’Ivoire</option>
                                        <option value="dj">🇩🇯 Djibouti</option>
                                        <option value="eg">🇪🇬 Egypt</option>
                                        <option value="gq">🇬🇶 Equatorial Guinea</option>
                                        <option value="er">🇪🇷 Eritrea</option>
                                        <option value="sz">🇸🇿 Eswatini</option>
                                        <option value="et">🇪🇹 Ethiopia</option>
                                        <option value="ga">🇬🇦 Gabon</option>
                                        <option value="gm">🇬🇲 Gambia</option>
                                        <option value="gh">🇬🇭 Ghana</option>
                                        <option value="gn">🇬🇳 Guinea</option>
                                        <option value="gw">🇬🇼 Guinea-Bissau</option>
                                        <option value="ke">🇰🇪 Kenya</option>
                                        <option value="ls">🇱🇸 Lesotho</option>
                                        <option value="lr">🇱🇷 Liberia</option>
                                        <option value="ly">🇱🇾 Libya</option>
                                        <option value="mg">🇲🇬 Madagascar</option>
                                        <option value="mw">🇲🇼 Malawi</option>
                                        <option value="ml">🇲🇱 Mali</option>
                                        <option value="mr">🇲🇷 Mauritania</option>
                                        <option value="mu">🇲🇺 Mauritius</option>
                                        <option value="ma">🇲🇦 Morocco</option>
                                        <option value="mz">🇲🇿 Mozambique</option>
                                        <option value="na">🇳🇦 Namibia</option>
                                        <option value="ne">🇳🇪 Niger</option>
                                        <option value="ng">🇳🇬 Nigeria</option>
                                        <option value="re">🇷🇪 Réunion</option>
                                        <option value="rw">🇷🇼 Rwanda</option>
                                        <option value="st">🇸🇹 São Tomé and Príncipe</option>
                                        <option value="sn">🇸🇳 Senegal</option>
                                        <option value="sc">🇸🇨 Seychelles</option>
                                        <option value="sl">🇸🇱 Sierra Leone</option>
                                        <option value="so">🇸🇴 Somalia</option>
                                        <option value="za">🇿🇦 South Africa</option>
                                        <option value="ss">🇸🇸 South Sudan</option>
                                        <option value="sd">🇸🇩 Sudan</option>
                                        <option value="tz">🇹🇿 Tanzania</option>
                                        <option value="tg">🇹🇬 Togo</option>
                                        <option value="tn">🇹🇳 Tunisia</option>
                                        <option value="ug">🇺🇬 Uganda</option>
                                        <option value="zm">🇿🇲 Zambia</option>
                                        <option value="zw">🇿🇼 Zimbabwe</option>

                                        <option value="af">🇦🇫 Afghanistan</option>
                                        <option value="am">🇦🇲 Armenia</option>
                                        <option value="az">🇦🇿 Azerbaijan</option>
                                        <option value="bh">🇧🇭 Bahrain</option>
                                        <option value="bd">🇧🇩 Bangladesh</option>
                                        <option value="bt">🇧🇹 Bhutan</option>
                                        <option value="bn">🇧🇳 Brunei</option>
                                        <option value="kh">🇰🇭 Cambodia</option>
                                        <option value="cn">🇨🇳 China</option>
                                        <option value="cy">🇨🇾 Cyprus</option>
                                        <option value="ge">🇬🇪 Georgia</option>
                                        <option value="hk">🇭🇰 Hong Kong</option>
                                        <option value="in">🇮🇳 India</option>
                                        <option value="id">🇮🇩 Indonesia</option>
                                        <option value="ir">🇮🇷 Iran</option>
                                        <option value="iq">🇮🇶 Iraq</option>
                                        <option value="il">🇮🇱 Israel</option>
                                        <option value="jp">🇯🇵 Japan</option>
                                        <option value="jo">🇯🇴 Jordan</option>
                                        <option value="kz">🇰🇿 Kazakhstan</option>
                                        <option value="kw">🇰🇼 Kuwait</option>
                                        <option value="kg">🇰🇬 Kyrgyzstan</option>
                                        <option value="la">🇱🇦 Laos</option>
                                        <option value="lb">🇱🇧 Lebanon</option>
                                        <option value="my">🇲🇾 Malaysia</option>
                                        <option value="mv">🇲🇻 Maldives</option>
                                        <option value="mn">🇲🇳 Mongolia</option>
                                        <option value="mm">🇲🇲 Myanmar</option>
                                        <option value="np">🇳🇵 Nepal</option>
                                        <option value="om">🇴🇲 Oman</option>
                                        <option value="pk">🇵🇰 Pakistan</option>
                                        <option value="ps">🇵🇸 Palestine</option>
                                        <option value="ph">🇵🇭 Philippines</option>
                                        <option value="qa">🇶🇦 Qatar</option>
                                        <option value="sa">🇸🇦 Saudi Arabia</option>
                                        <option value="sg">🇸🇬 Singapore</option>
                                        <option value="kr">🇰🇷 South Korea</option>
                                        <option value="lk">🇱🇰 Sri Lanka</option>
                                        <option value="sy">🇸🇾 Syria</option>
                                        <option value="tw">🇹🇼 Taiwan</option>
                                        <option value="tj">🇹🇯 Tajikistan</option>
                                        <option value="th">🇹🇭 Thailand</option>
                                        <option value="tl">🇹🇱 Timor-Leste</option>
                                        <option value="tr">🇹🇷 Turkey</option>
                                        <option value="tm">🇹🇲 Turkmenistan</option>
                                        <option value="ae">🇦🇪 United Arab Emirates</option>
                                        <option value="uz">🇺🇿 Uzbekistan</option>
                                        <option value="vn">🇻🇳 Vietnam</option>
                                        <option value="ye">🇾🇪 Yemen</option>

                                        <option value="al">🇦🇱 Albania</option>
                                        <option value="ad">🇦🇩 Andorra</option>
                                        <option value="at">🇦🇹 Austria</option>
                                        <option value="by">🇧🇾 Belarus</option>
                                        <option value="be">🇧🇪 Belgium</option>
                                        <option value="ba">🇧🇦 Bosnia and Herzegovina</option>
                                        <option value="bg">🇧🇬 Bulgaria</option>
                                        <option value="hr">🇭🇷 Croatia</option>
                                        <option value="cz">🇨🇿 Czech Republic</option>
                                        <option value="dk">🇩🇰 Denmark</option>
                                        <option value="ee">🇪🇪 Estonia</option>
                                        <option value="fi">🇫🇮 Finland</option>
                                        <option value="fr">🇫🇷 France</option>
                                        <option value="de">🇩🇪 Germany</option>
                                        <option value="gr">🇬🇷 Greece</option>
                                        <option value="hu">🇭🇺 Hungary</option>
                                        <option value="is">🇮🇸 Iceland</option>
                                        <option value="ie">🇮🇪 Ireland</option>
                                        <option value="it">🇮🇹 Italy</option>
                                        <option value="lv">🇱🇻 Latvia</option>
                                        <option value="li">🇱🇮 Liechtenstein</option>
                                        <option value="lt">🇱🇹 Lithuania</option>
                                        <option value="lu">🇱🇺 Luxembourg</option>
                                        <option value="mt">🇲🇹 Malta</option>
                                        <option value="md">🇲🇩 Moldova</option>
                                        <option value="mc">🇲🇨 Monaco</option>
                                        <option value="me">🇲🇪 Montenegro</option>
                                        <option value="nl">🇳🇱 Netherlands</option>
                                        <option value="no">🇳🇴 Norway</option>
                                        <option value="pl">🇵🇱 Poland</option>
                                        <option value="pt">🇵🇹 Portugal</option>
                                        <option value="ro">🇷🇴 Romania</option>
                                        <option value="ru">🇷🇺 Russia</option>
                                        <option value="rs">🇷🇸 Serbia</option>
                                        <option value="sk">🇸🇰 Slovakia</option>
                                        <option value="si">🇸🇮 Slovenia</option>
                                        <option value="es">🇪🇸 Spain</option>
                                        <option value="se">🇸🇪 Sweden</option>
                                        <option value="ch">🇨🇭 Switzerland</option>
                                        <option value="ua">🇺🇦 Ukraine</option>
                                        <option value="gb">🇬🇧 United Kingdom</option>
                                        <option value="va">🇻🇦 Vatican City</option>
                                        <option value="xk">🇽🇰 Kosovo</option>

                                        <option value="ag">🇦🇬 Antigua and Barbuda</option>
                                        <option value="bs">🇧🇸 Bahamas</option>
                                        <option value="bb">🇧🇧 Barbados</option>
                                        <option value="bz">🇧🇿 Belize</option>
                                        <option value="ca">🇨🇦 Canada</option>
                                        <option value="cr">🇨🇷 Costa Rica</option>
                                        <option value="cu">🇨🇺 Cuba</option>
                                        <option value="dm">🇩🇲 Dominica</option>
                                        <option value="do">🇩🇴 Dominican Republic</option>
                                        <option value="sv">🇸🇻 El Salvador</option>
                                        <option value="gd">🇬🇩 Grenada</option>
                                        <option value="gt">🇬🇹 Guatemala</option>
                                        <option value="ht">🇭🇹 Haiti</option>
                                        <option value="hn">🇭🇳 Honduras</option>
                                        <option value="jm">🇯🇲 Jamaica</option>
                                        <option value="mx">🇲🇽 Mexico</option>
                                        <option value="ni">🇳🇮 Nicaragua</option>
                                        <option value="pa">🇵🇦 Panama</option>
                                        <option value="kn">🇰🇳 Saint Kitts and Nevis</option>
                                        <option value="lc">🇱🇨 Saint Lucia</option>
                                        <option value="vc">🇻🇨 Saint Vincent and the Grenadines</option>
                                        <option value="tt">🇹🇹 Trinidad and Tobago</option>
                                        <option value="us">🇺🇸 United States</option>

                                        <option value="ar">🇦🇷 Argentina</option>
                                        <option value="bo">🇧🇴 Bolivia</option>
                                        <option value="br">🇧🇷 Brazil</option>
                                        <option value="cl">🇨🇱 Chile</option>
                                        <option value="co">🇨🇴 Colombia</option>
                                        <option value="ec">🇪🇨 Ecuador</option>
                                        <option value="gy">🇬🇾 Guyana</option>
                                        <option value="py">🇵🇾 Paraguay</option>
                                        <option value="pe">🇵🇪 Peru</option>
                                        <option value="sr">🇸🇷 Suriname</option>
                                        <option value="uy">🇺🇾 Uruguay</option>
                                        <option value="ve">🇻🇪 Venezuela</option>

                                        <option value="au">🇦🇺 Australia</option>
                                        <option value="fj">🇫🇯 Fiji</option>
                                        <option value="ki">🇰🇮 Kiribati</option>
                                        <option value="mh">🇲🇭 Marshall Islands</option>
                                        <option value="fm">🇫🇲 Micronesia</option>
                                        <option value="nr">🇳🇷 Nauru</option>
                                        <option value="nz">🇳🇿 New Zealand</option>
                                        <option value="pw">🇵🇼 Palau</option>
                                        <option value="pg">🇵🇬 Papua New Guinea</option>
                                        <option value="ws">🇼🇸 Samoa</option>
                                        <option value="sb">🇸🇧 Solomon Islands</option>
                                        <option value="to">🇹🇴 Tonga</option>
                                        <option value="tv">🇹🇻 Tuvalu</option>
                                        <option value="vu">🇻🇺 Vanuatu</option>
                                    </select>
                                    <span id="server_error" class="text-danger small" style="display:none;">❌ Please
                                        select a
                                        server</span>
                                    @error('server')
                                        <span class="text-danger small" style="display:block;">❌ {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" id="submit_btn" class="btn-start-game">Start Game</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
    <script>
        function setBookmarker(promoId, element) {
            var bookmakerLogos = document.querySelectorAll('.bookmaker-logo');
            bookmakerLogos.forEach(function(logo) {
                logo.classList.remove('active');
            });

            element.classList.add('active');

            $('#promo_id').val(promoId);

            // console.log("Selected Bookmaker:", name);
        }
    </script>



    <script>
        // ১. বুকমেকার সিলেকশন ফাংশন (এটি গ্লোবাল রাখা হয়েছে)
        function setBookmarker(id, element) {
            const promoInput = document.getElementById('promo_id');
            const promoError = document.getElementById('promo_error');

            if (promoInput) {
                promoInput.value = id;
                if (promoError) promoError.style.display = 'none';

                // ভিজ্যুয়াল সিলেকশন UI আপডেট
                document.querySelectorAll('.bookmaker-logo').forEach(el => {
                    el.style.filter = 'grayscale(100%)';
                    el.style.border = 'none';
                    el.classList.remove('selected-bookie');
                });

                element.style.filter = 'grayscale(0%) drop-shadow(0 0 8px #00d2ff)';
                element.style.border = '1px solid #00d2ff';
                element.style.borderRadius = '8px';
                element.classList.add('selected-bookie');

                // ভ্যালিডেশন ট্রিগার করার জন্য কাস্টম ইভেন্ট
                window.dispatchEvent(new Event('form-check'));
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const playerIdInput = document.getElementById('player_id_input');
            const playerIdError = document.getElementById('player_id_error');
            const amountInput = document.getElementById('deposit_amount_input');
            const amountError = document.getElementById('deposit_amount_error');
            const serverSelect = document.getElementById('server_select');
            const submitBtn = document.getElementById('submit_btn');
            const promoInput = document.getElementById('promo_id');

            // ২. মেইন ভ্যালিডেশন লজিক (সব ফিল্ড চেক করবে)
            function validateForm() {
                const pId = playerIdInput.value.trim();
                const amountVal = amountInput.value.trim();

                const isPromoSelected = promoInput.value !== "";
                const isServerSelected = serverSelect.value !== "" && serverSelect.value !== "Select Server";
                const isPlayerIdValid = (pId.length === 10 && pId.startsWith('1') && /^\d+$/.test(pId));

                // Amount ভ্যালিডেশন: খালি থাকা যাবে না, সংখ্যা হতে হবে এবং ০ এর বেশি হতে হবে
                const isAmountValid = (amountVal !== "" && !isNaN(amountVal) && parseFloat(amountVal) > 0);

                if (isPromoSelected && isServerSelected && isPlayerIdValid && isAmountValid) {
                    submitBtn.disabled = false;
                    submitBtn.style.opacity = "1";
                    submitBtn.style.cursor = "pointer";
                    submitBtn.style.pointerEvents = "auto";
                } else {
                    submitBtn.disabled = true;
                    submitBtn.style.opacity = "0.5";
                    submitBtn.style.cursor = "not-allowed";
                    submitBtn.style.pointerEvents = "none";
                }
            }

            // ৩. Player ID রিয়েল-টাইম ভ্যালিডেশন
            if (playerIdInput) {
                ['input', 'keyup', 'blur'].forEach(evt => {
                    playerIdInput.addEventListener(evt, function() {
                        const val = this.value.trim();
                        let msg = "";

                        if (val.length > 0) {
                            if (!/^\d+$/.test(val)) {
                                msg = "❌ Only numbers allowed!";
                            } else if (val.charAt(0) !== '1') {
                                msg = "❌ ID must start with 1";
                            } else if (val.length !== 10) {
                                msg = "⚠️ Need 10 digits (Current: " + val.length + ")";
                            }
                        }

                        if (msg !== "" && val.length > 0) {
                            playerIdError.textContent = msg;
                            playerIdError.style.display = "block";
                            this.style.borderColor = "#ff4d4d";
                        } else {
                            playerIdError.style.display = "none";
                            this.style.borderColor = val.length === 10 ? "#25D366" : "#00d2ff";
                        }
                        validateForm();
                    });
                });
            }

            // ৪. Amount ফিল্ডের জন্য রিয়েল-টাইম ভ্যালিডেশন
            if (amountInput) {
                ['input', 'keyup', 'blur'].forEach(evt => {
                    amountInput.addEventListener(evt, function() {
                        const val = this.value.trim();
                        let msg = "";

                        if (val !== "") {
                            if (isNaN(val) || parseFloat(val) <= 0) {
                                msg = "❌ Enter a valid amount!";
                            }
                        }

                        if (msg !== "" && val !== "") {
                            if (amountError) {
                                amountError.textContent = msg;
                                amountError.style.display = "block";
                            }
                            this.style.borderColor = "#ff4d4d";
                        } else {
                            if (amountError) amountError.style.display = "none";
                            this.style.borderColor = val !== "" ? "#25D366" : "#00d2ff";
                        }
                        validateForm();
                    });
                });
            }

            // ৫. Server সিলেকশন চেঞ্জ লিসেনার
            if (serverSelect) {
                serverSelect.addEventListener('change', validateForm);
            }

            // ৬. বুকমেকার সিলেকশনের জন্য কাস্টম লিসেনার
            window.addEventListener('form-check', validateForm);

            // পেজ লোড হওয়ার সময় একবার চেক করা
            validateForm();
        });
    </script>
@endsection
