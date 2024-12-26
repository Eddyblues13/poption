<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            <a class="nav-link" href="#" role="button" data-toggle="collapse" data-target="#sidebar"
                aria-expanded="false" aria-controls="sidebar">
                <button class="btn btn-outline-light btn-gradient">
                    <img src="assets/img/2.pn" alt="logo" class="img-fluid">
                </button>
            </a>

            <!-- Sidebar -->
            <div class="collapse" id="sidebar">
                <div class="bg-dark p-4" style="width: 250px; height: 100vh;">
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">

                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary">QT Real</span>
                                <span class="badge bg-secondary">NGN</span>
                                <span>0</span>
                            </div>
                        </a>
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
                    <li class="nav-item dropdown header-img-icon">
                        <!-- Refined "Make Deposit" Dropdown -->
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <button class="btn btn-outline-light btn-gradient">
                                <i class="bi bi-wallet2"></i>
                            </button>
                        </a>
                        <div class="dropdown-menu p-4" style="width: 500px; border-radius: 10px; background: #1c1f2c;">
                            <h4 class="text-white mb-3" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                                Quick Account Top-up</h4>
                            <p class="text-white" style="font-family: 'Roboto', sans-serif; font-size: 14px;">Make a
                                deposit to start earning</p>
                            <form action="/make-deposit" method="POST">
                                @csrf

                                <!-- Deposit Method -->
                                <div class="form-group">
                                    <label for="deposit-method" class="font-weight-bold text-white"
                                        style="font-family: 'Roboto', sans-serif;">Payment Method</label>
                                    <select class="form-control" id="deposit-method" name="deposit_method" required
                                        style="border-radius: 5px;">
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

                                <!-- Deposit Amount -->
                                <div class="form-group">
                                    <label for="deposit-amount" class="font-weight-bold text-white"
                                        style="font-family: 'Roboto', sans-serif;">Amount</label>
                                    <input type="number" class="form-control" id="deposit-amount" name="amount"
                                        placeholder="Enter deposit amount" required value="{{ old('amount') }}"
                                        style="border-radius: 5px;">
                                </div>

                                <!-- Promo Code -->
                                <div class="form-group d-flex align-items-center">
                                    <input type="radio" id="promo-code" name="promo_code" value="yes" {{
                                        old('promo_code')=='yes' ? 'checked' : '' }}
                                        style="appearance: none; width: 18px; height: 18px; border: 2px solid #ecf0f1; border-radius: 3px; background-color: #34495e; cursor: pointer;">
                                    <label for="promo-code" class="mb-0 ml-2 text-white"
                                        style="font-family: 'Roboto', sans-serif; cursor: pointer;">I have a promo
                                        code</label>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" id="submit-button" class="btn-primary-custom py-2 px-3 mb-4"
                                    style="border: none; border-radius: 5px; font-family: 'Roboto', sans-serif; font-weight: 700;">
                                    Continue and pay
                                </button>
                            </form>

                            <script>
                                // Select the amount input and submit button
                                const amountInput = document.getElementById('deposit-amount');
                                const submitButton = document.getElementById('submit-button');
                        
                                // Function to update the button text
                                function updateButtonText() {
                                    const amount = amountInput.value || 0; // Default to 0 if input is empty
                                    submitButton.textContent = `Continue and pay ${amount}`;
                                }
                        
                                // Add event listener to the input field
                                amountInput.addEventListener('input', updateButtonText);
                        
                                // Initialize the button text on page load
                                updateButtonText();
                            </script>
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
                                    <div class="time-amount-display">
                                        <small class="d-block text-muted">Time</small>
                                        <strong>00:01:00</strong>
                                    </div>
                                    <div class="time-amount-display">
                                        <small class="d-block text-muted">Amount</small>
                                        <input type="number" name="amount" class="form-control" value="1500" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <small class="text-muted">Payout</small>
                                        <div class="text-success">₦2,505</div>
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
                        <a href="#" class="bottom-nav-item">
                            <i class="bi bi-hourglass"></i>
                            Pending Trades
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