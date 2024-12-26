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

    .withdrawal-box {
        background-color: #222244;
        border-radius: 8px;
        padding: 20px;
        max-width: 600px;
        margin: 50px auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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





            <div class="collapse navbar-collapse" id="headerMenu">

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
                        <div class="dropdown-menu p-4" style="width: 400px;">
                            <h5 class="dropdown-header text-center">Make a Deposit</h5>
                            <form action="/make-deposit" method="POST">
                                @csrf

                                <!-- Deposit Method -->
                                <div class="form-group">
                                    <label for="deposit-method" class="font-weight-bold">Choose Deposit Method</label>
                                    <select class="form-control" id="deposit-method" name="deposit_method" required>
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
                                    <label for="deposit-amount" class="font-weight-bold">Enter Amount</label>
                                    <input type="number" class="form-control" id="deposit-amount" name="amount"
                                        placeholder="Enter deposit amount" required value="{{ old('amount') }}">
                                </div>

                                <!-- Promo Code -->
                                <div class="form-group d-flex align-items-center">
                                    <input type="radio" id="promo-code" name="promo_code" value="yes" class="mr-2" {{
                                        old('promo_code')=='yes' ? 'checked' : '' }}>
                                    <label for="promo-code" class="mb-0">I have a promo code</label>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-block">Proceed with Deposit</button>
                            </form>

                        </div>
                    </li>


                </ul>
            </div>
        </nav>
    </header>
    <div class="container-fluid mtb15 no-fluid">
        <!-- Main Trading Area -->

        <div class="container">
            <div class="withdrawal-box text-center">
                <h2 class="mb-4">Withdrawal</h2>

                <div class="mb-3">
                    <h5>Free Balance</h5>
                    <p class="fs-4">€0</p>
                </div>

                <div class="mb-3">
                    <h5>Minimum Withdrawal Amount</h5>
                    <p class="fs-4">€9.70</p>
                </div>

                <div class="mb-3">
                    <h5>Commission</h5>
                    <p class="fs-4">€0</p>
                </div>

                <div class="info-box text-start">
                    <i class="bi bi-info-circle"></i>
                    Withdrawal process becomes available after you deposit on your account. Typically, a withdrawal
                    request is processed automatically and takes a few minutes, and in some cases up to 3 business days.
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