<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Transfer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --dark-bg: #13151d;
            --card-bg: #1c1f2c;
            --input-bg: #272b3b;
            --text-primary: #ffffff;
            --text-secondary: #7a8093;
            --accent-blue: #037bff;
            --border-color: #2d3245;
        }

        body {
            background-color: #151726;
            color: var(--text-primary);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        .top-header {
            background-color: var(--card-bg);
            padding: 0.5rem 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .card {
            background-color: #151726;
            border: 1px solid var(--border-color);
            border-radius: 8px;
        }

        .input-dark {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            padding: 0.5rem;
            border-radius: 6px;
        }

        .btn-primary-custom {
            background-color: var(--accent-green);
            border: 1px solid #025B44;
            color: white;
            border-radius: 6px;
            width: 90%;
        }

        .btn-primary-custom:hover {
            background-color: #025B44;
        }

        .terms-box {
            background-color: rgba(35, 134, 54, 0.1);
            border: 1px solid var(--accent-green);
            border-radius: 6px;
            padding: 1rem;
            margin: 1rem 0;
        }

        .gift-option {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            /* margin-right: 10px; */
            cursor: pointer;
            transition: transform 0.2s;
        }

        .gift-option:hover {
            transform: scale(1.05);
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #1c1f2c;
            border-top: 1px solid #2d3245;
            padding: 12px 8px;
            z-index: 1000;
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            color: #7a8093;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .nav-item i {
            font-size: 20px;
            margin-bottom: 2px;
        }

        .nav-item span {
            font-size: 12px;
        }

        .nav-item:hover {
            color: #ffffff;
        }

        .delete-btn {
            color: #f85149;
            background: none;
            border: none;
            padding: 0.25rem 0.5rem;
        }
    </style>
</head>

<body>
    <header class="top-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="assets/img/options_logo.png" alt="Logo" class="me-2"
                    style="width: 40px; height: 40px; border-radius: 100%;">
            </div>
            <div class="d-flex align-items-center">
                <span class="me-2">QT Real </span>

            </div>
        </div>
    </header>

    <div class="main-container mb-5">

        <div class="row">
            <div class="col-md-3 mt-1">
                <h2 class="mb-4 fs-4">Account top-up</h2>
            </div>
            <div class="col-md-5 mt-5">
                <div class="card p-4">
                    <div class="d-flex align-items-center mb-4">
                        <button class="btn btn-link text-white text-decoration-none" onclick="window.history.back()">
                            <i class="fas fa-arrow-left"></i> Back
                        </button>
                    </div>
                    @php
                    $currencySymbol = $currencyMap[$currencyCode] ?? $currencyCode; // Get symbol or fallback to code
                    @endphp

                    <form action="{{ route('payment.initiate') }}" method="POST">
                        @csrf
                        <div class="d-flex align-items-center mb-4">
                            <img src="assets/img/icon.webp" alt="Bank" class="me-3" style="width: 110px; height: 50px;">
                            <div>
                                <h5 class="mb-1 text-white">Bank Transfer ({{ $currencyCode }})</h5>
                                <small class="text-secondary">
                                    Commission: 0%<br>
                                    Minimum deposit amount: {{ $currencySymbol }}7,740<br>
                                    Max. amount per transaction: {{ $currencySymbol }}900,000<br>
                                    Processing time: ~10 min.
                                </small>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-light">Amount:</label>
                            <input type="text" name="amount" class="input-dark w-100" value="{{ $amount }}" required>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="promoCheck">
                                <label class="form-check-label text-secondary" for="promoCheck">
                                    I have a promo code
                                </label>
                            </div>

                            <div id="promoCodeSection" class="mt-3">
                                <label class="form-label text-light">Promo code:</label>
                                <div class="d-flex">
                                    <input type="text" class="input-dark flex-grow-1">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-light">Name:</label>
                            <input type="text" name="name" class="input-dark w-100" value="{{Auth::user()->name}}"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-light">Email:</label>
                            <input type="text" name="email" class="input-dark w-100" value="{{Auth::user()->email}}"
                                required>
                        </div>
                        <input type="hidden" name="currency" class="input-dark w-100" value="{{ $currencyCode }}"
                            required>

                        <div>
                            <p class="mb-3 text-secondary">Choose your Gift for deposit:</p>
                            <div class="d-flex gap-4 justify-content-center">
                                <img src="assets/img/first.jpg" alt="Gift 1" class="gift-option">
                                <img src="assets/img/second.jpg" alt="Gift 2" class="gift-option">
                                <img src="assets/img/third.jpg" alt="Gift 3" class="gift-option">
                                <img src="assets/img/fourth.jpg" alt="Gift 4" class="gift-option">
                                <img src="assets/img/fifth.jpg" alt="Gift 5" class="gift-option">
                            </div>
                        </div>

                </div>
            </div>

            <div class="col-md-4 mt-5">
                <div class="px-1">
                    <h6 class="mb-3 text-secondary">You receive:</h6>
                    <h3 class="mb-3 text-light">{{ $currencySymbol }}{{ number_format($amount, 2) }}</h3>


                    <button type="submit" class="btn-primary-custom py-1 px-1 mb-4">
                        Continue and pay {{ $currencySymbol }}{{ number_format($amount, 2) }}
                    </button>

                    </form>

                    <h6 class="mb-3 text-light">Do you have questions or need help with account top-up?</h6>
                    <a href="#" class="text-info d-block mb-2">View our User Guide</a>
                    <a href="#" class="text-info d-block">Contact Support Service</a>
                </div>
            </div>
        </div>
    </div>

    <nav class="bottom-nav">
        <div class="d-flex justify-content-around align-items-center">
            <a href="#" class="nav-item">
                <i class="fas fa-wallet"></i>
                <span>Deposit</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-right-left"></i>
                <span>Withdrawal</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-clock-rotate-left"></i>
                <span>History</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-rotate-left"></i>
                <span>Cashback</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-ticket"></i>
                <span>Promo codes</span>
            </a>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/97805ec877.js" crossorigin="anonymous"></script>
    <script>
        // Toggle promo code section visibility
        const promoCheck = document.getElementById('promoCheck');
        const promoCodeSection = document.getElementById('promoCodeSection');

        promoCheck.addEventListener('change', function() {
            promoCodeSection.style.display = this.checked ? 'block' : 'none';
        });

        // Initialize the promo code section based on checkbox state
        promoCodeSection.style.display = promoCheck.checked ? 'block' : 'none';


        // Handle gift selection
        document.querySelectorAll('.gift-option').forEach(gift => {
            gift.addEventListener('click', function() {
                document.querySelectorAll('.gift-option').forEach(g => {
                    g.style.border = 'none';
                });
                this.style.border = '2px solid var(--accent-green)';
            });
        });
    </script>
</body>

</html>