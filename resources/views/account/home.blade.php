<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
    <meta name="bingbot" content="noindex, nofollow">
    <meta name="scam-advisor" content="noindex, nofollow">
    <title>Crypo</title>
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<style>
    :root {
        --dark-blue: #0a1929;
        --darker-blue: #061320;
        --light-blue: #1a2b3d;
        --buy-green: #22c55e;
        --sell-red: #ef4444;
        --chart-blue: #3b82f6;
    }

    body {
        background-color: var(--dark-blue);
        color: #fff;
        min-height: 100vh;
    }

    .trading-header {
        background-color: var(--darker-blue);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .currency-select {
        background-color: var(--light-blue);
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
    }

    .trading-chart {
        background-color: var(--darker-blue);
        border-radius: 0.5rem;
        height: calc(100vh - 180px);
    }

    .trading-controls {
        background-color: var(--darker-blue);
        border-radius: 0.5rem;
    }

    .btn-buy {
        background-color: var(--buy-green);
        color: white;
    }

    .btn-sell {
        background-color: var(--sell-red);
        color: white;
    }

    .btn-ai {
        background-color: #0ea5e9;
        color: white;
    }

    .btn-gradient {
        background: linear-gradient(to right, rgba(0, 128, 0, 0.15), rgba(144, 238, 144, 0.5));
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


    .time-amount-display {
        background-color: var(--light-blue);
        border-radius: 0.5rem;
        padding: 0.5rem;
    }

    .bottom-nav {
        background-color: var(--darker-blue);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }

    .bottom-nav-item {
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        font-size: 0.7rem;
        text-align: center;
        background-color: var(--light-blue);
        padding: 0.5rem 2rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .bottom-nav-item i {
        font-size: 1rem;
        margin-bottom: 0.2rem;
    }

    .bottom-nav-item:hover {
        color: white;
        background-color: var(--dark-blue);
    }

    .wallet-button {
        background-color: #074f40;
        background: linear-gradient(75deg, rgba(6, 201, 49, .35) 1.75%, rgba(6, 201, 49, 0) 34.25%);
        border: 1px solid #047838;
        color: #5aa86b;
    }

    .wallet-button:focus {
        outline: none;
        box-shadow: none;
    }

    .popup-form {
        background-color: #1a1f2e;
        color: white;
        width: 320px;
        border-radius: 8px;
        padding: 20px;
        position: fixed;
        top: 60px;
        right: 20px;
        z-index: 1000;
        display: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid #343e52;
    }

    .dark-select option {
        background-color: #1a1f2e !important;
        font-size: 14px;
    }


    .dark-input,
    .dark-select {
        background-color: #162032 !important;
        border-color: #44506a !important;
        color: grey !important;
    }

    .dark-input:focus {
        background-color: #162032 !important;
        border-color: #44506a !important;
        color: grey !important;
        box-shadow: none !important;
    }

    .dark-select:focus {
        background-color: #162032 !important;
        /* border-color: #44506a !important; */
        border: none;
        color: grey !important;
        box-shadow: none !important;

    }

    .close-btn {
        background: none;
        border: none;
        color: #6c757d;
        font-size: 1.2rem;
        padding: 0;
        cursor: pointer;
    }

    .close-btn:hover {
        color: white;
    }

    .form-check-input {
        background-color: transparent;
        border-color: #2a2e39;
    }

    .form-check-input:checked {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .submit-btn {
        background-color: #172832;
        border: 1px solid #047838;
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        color: white;
        font-weight: 500;
    }

    .submit-btn:hover {
        background-color: #047838;
    }

    .text-gray {
        color: #6c757d;
    }




    @media (max-width: 768px) {
        .trading-chart {
            height: calc(100vh - 350px);
        }

        .bottom-nav .bottom-nav-item {
            padding: 0px 30px;
            font-size: small;
        }

        .trade-buttons {
            display: flex;
            justify-content: center;

        }
    }
</style>

<body id="dark">
    <header class="dark-bb">

        <nav class="navbar navbar-expand-lg">
            <a class="nav-link px-3" href="#" role="button" data-toggle="collapse" data-target="#sidebar"
                aria-expanded="false" aria-controls="sidebar">
                {{-- <img src="assets/img/poplogo.png" width="30" height="30" alt="logo"
                    class="img-fluid rounded-circle"> --}}
                <button class="btn btn-outline-light btn-gradient">
                    <img src="assets/img/2.png" width="30" height="30" alt="logo" class="img-fluid">
                </button>
            </a>

            <!-- Sidebar -->
            <div class="collapse" id="sideba">
                <div class="bg-dark p-4" style="width: 250px; height: 50vh;">
                    <!-- Avatar and User Info -->
                    <div class="text-center py-2 border-bottom border-secondary">
                        <img src="https://via.placeholder.com/100" alt="Default Avatar" class="rounded-circle mb-3"
                            style="width: 30px; height: 30px; object-fit: cover; border: 2px solid #ffffff;">
                        <h5 id="user-name" class="mb-0">John Doe</h5>
                        <p id="user-email" class="text-muted small">johndoe@example.com</p>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>






            <div class="navbar-item navbar-nav ml-auto d-flex align-items-center" id="headerMenu">

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown header-img-icon">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-primary">QT Real</span>
                            <span class="badge bg-secondary">{{Auth::user()->currency}}</span>
                            <span>{{$balance_sum}}</span>
                            <span class="me-2">
                                <button class="btn wallet-button" id="openPopupBtn"><i
                                        class="bi bi-wallet2"></i></button>
                            </span>
                        </div>

                        {{-- deposit popup form starts here --}}
                        <div class="popup-overlay" id="popupOverlay"></div>
                        <div class="popup-form" id="popupForm">
                            <!-- Header -->
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h5 class="mb-1">Quick account top-up</h5>
                                    <p class="text-light mb-0" style="font-size: 0.875rem;">Make a deposit to start
                                        earning</p>
                                </div>
                                <button class="close-btn fs-4" id="closePopupBtn">&times;</button>
                            </div>

                            <!-- Form -->

                            <form action="/make-deposit" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="text-light mb-2" style="font-size: 0.875rem;">Payment Method</label>
                                    <select class="form-select dark-select" name="deposit_method" required>
                                        <option value="bank_transfer" {{ old('deposit_method')=='bank_transfer'
                                            ? 'selected' : '' }}>Bank Transfer</option>
                                        <option value="bitcoin" {{ old('deposit_method')=='bitcoin' ? 'selected' : ''
                                            }}>Bitcoin</option>
                                        <option value="ethereum" {{ old('deposit_method')=='ethereum' ? 'selected' : ''
                                            }}>Ethereum</option>
                                        <option value="litecoin" {{ old('deposit_method')=='litecoin' ? 'selected' : ''
                                            }}>Litecoin</option>
                                        <option value="usdt" {{ old('deposit_method')=='usdt' ? 'selected' : '' }}>USDT
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="text-gray mb-2" style="font-size: 0.875rem;">Amount</label>
                                    <input type="number" name="amount" class="form-control dark-input" id="amountInput"
                                        required value="{{ old('amount') }}">
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="promoCheck">
                                        <label class="form-check-label" for="promoCheck">
                                            I have a promo code
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="submit-btn pop-submit-btn" id="submitBtn">Continue and pay
                                    {{Auth::user()->currency}}0.00</button>
                            </form>

                            <script>
                                //pop up form js codes

                                const amountInput = document.getElementById('amountInput');
                                const submitBtn = document.getElementById('submitBtn');
                                const openPopupBtn = document.getElementById('openPopupBtn');
                                const closePopupBtn = document.getElementById('closePopupBtn');
                                const popupForm = document.getElementById('popupForm');

                                // Update button text when amount changes
                                amountInput.addEventListener('input', function() {
                                    const amount = this.value ? parseInt(this.value).toLocaleString() : '0';
                                    submitBtn.textContent = `Continue and pay {{Auth::user()->currency}}${amount}`;
                                });

                                // Open popup
                                openPopupBtn.addEventListener('click', function() {
                                    popupForm.style.display = 'block';
                                });

                                // Close popup
                                closePopupBtn.addEventListener('click', function() {
                                    popupForm.style.display = 'none';
                                });

                                // Prevent default page reload after form  submission
                                const form = document.getElementById('topupForm');
                                form.addEventListener('submit', function(e) {
                                    e.preventDefault();
                                });
                            </script>
                        </div>


                        <div class="dropdown-menu">
                            <div class="dropdown-header d-flex flex-column align-items-center">
                                <div class="figure mb-3">
                                    <img src="assets/img/avatar.svg" alt="">
                                </div>
                                <div class="info text-center">
                                    <p class="name font-weight-bold mb-0">Tony Stark</p>
                                    <p class="email text-muted mb-3">tonystark@gmail.com</p>
                                </div>
                            </div>
                            <div class="dropdown-body">
                                <ul class="profile-nav">
                                    <li class="nav-item">
                                        <a class='nav-link' href='/settings-profile-dark'>
                                            <i class="icon ion-md-person"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class='nav-link' href='/settings-wallet-dark'>
                                            <i class="icon ion-md-wallet"></i>
                                            <span>My Wallet</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class='nav-link' href='/settings-dark'>
                                            <i class="icon ion-md-settings"></i>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" id="changeThemeDark">
                                        <a href="#!" class="nav-link">
                                            <i class="icon ion-md-moon"></i>
                                            <span>Theme</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class='nav-link red' href='/exchange-dark'>
                                            <i class="icon ion-md-power"></i>
                                            <span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    

                </ul>
            </div>
        </nav>





    </header>
    <div class="container-fluid mtb15 no-fluid">
        <!-- Main Trading Area -->
        <div class="container-fluid py-3">
            <div class="row">
                <!-- Chart Area -->
                <div class="col-md-9">
                    <div class="trading-chart mb-3">
                        <!-- TradingView Widget -->
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script>
                            new TradingView.widget({
      container_id: "tradingview_chart",
      autosize: true,
      symbol: "NASDAQ:AAPL",
      interval: "1",
      timezone: "Etc/UTC",
      theme: "dark",
      style: "1",
      locale: "en",
      toolbar_bg: "#f1f3f6",
      enable_publishing: false,
      allow_symbol_change: true,
      studies: ["BB@tv-basicstudies"],
    });
                        </script>
                    </div>
                </div>

                <!-- Trading Controls -->
                <div class="col-md-3">
                    <div class="trading-controls p-3">
                        <form id="tradeForm" method="POST" action="{{route('trade')}}">
                            @csrf
                            <!-- Time and Amount -->
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="time-amount-display me-2">
                                        <small class="d-block text-secondary">Time</small>
                                        <strong>00:01:00</strong>
                                    </div>
                                    <div class="time-amount-display">
                                        <small class="d-block text-secondary">Amount</small>
                                        <input type="number" name="amount" class="form-control" value="1500" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <small class="text-muted">Payout</small>
                                        <div class="text-success">{{Auth::user()->currency}}2,505</div>
                                    </div>
                                    <div>
                                        <small class="text-muted">Profit</small>
                                        <div class="text-success">+67%</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Trading Buttons -->
                            <div class="d-lg-grid d-md-grid d-sm-flex gap-2 trade-buttons">
                                <button type="submit" name="action" value="buy" class="btn btn-buy">BUY</button>
                                <button type="submit" name="action" value="ai" class="btn btn-ai">
                                    <i class="bi bi-robot"></i> AI TRADING
                                </button>
                                <button type="submit" name="action" value="sell" class="btn btn-sell">SELL</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Bottom Navigation -->
        <div class="bottom-nav">
            <div class="">
                <div class="row g-1">
                    <div class="col-2">
                        <a href="#" class="bottom-nav-item">
                            <i class="bi bi-clock-history"></i>
                            Trades
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="#" class="bottom-nav-item">
                            <i class="bi bi-broadcast"></i>
                            Signals
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="#" class="bottom-nav-item">
                            <i class="bi bi-people"></i>
                            Social Trading
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="#" class="bottom-nav-item">
                            <i class="bi bi-lightning"></i>
                            Express Trades
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="#" class="bottom-nav-item">
                            <i class="bi bi-trophy"></i>
                            Tournaments
                        </a>
                    </div>

                    <div class="col-2">
                        <a href="{{route('user.logout')}}" class="bottom-nav-item">
                            <i class="bi bi-hourglass"></i>
                            logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/amcharts-core.min.js"></script>
    <script src="assets/js/amcharts.min.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        $('tbody, .market-news ul').mCustomScrollbar({
            theme: 'minimal',
        });
    </script>
</body>

</html>