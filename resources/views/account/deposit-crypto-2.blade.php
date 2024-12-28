<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto Deposit</title>
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

        .depo {
            border-radius: 6px;
            /* border: 1px solid white; */
        }

        .warning-box {
            border: 1px dashed #a34b19;
            background-color: #31262b;
            border-radius: 6px;
        }

        .copy-btn {
            background-color: transparent;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
        }

        .copy-btn:hover {
            color: var(--text-primary);
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

        .address,
        .amount {
            overflow-x: auto;
        }

        @media (max-width: 600px) {
            .qr {
                display: block;
            }

            .qr .item {
                margin: 0 auto;
            }

        }
    </style>
</head>

<body>
    <header class="top-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="img/options_logo.png" alt="Logo" class="me-2"
                    style="width: 40px; height: 40px; border-radius: 100%;">
            </div>
            <div class="d-flex align-items-center">
                <span class="me-2">QT Real</span>

            </div>
        </div>
    </header>

    <div class="main-container mb-5">

        <div class="row">

            <div class="col-md-12 col-lg-8 col-sm-12 mx-auto mt-5">
                <div class="card p-4">
                    <div class="d-flex align-items-center mb-4">
                        <button class="btn btn-link text-white text-decoration-none" onclick="window.history.back()">
                            <i class="fas fa-arrow-left"></i> Back
                        </button>
                    </div>

                    <div class="row d-flex justify-content-center align-items-center mb-4 px-3">
                        <div class="col-6 ps-0 d-flex justify-content-center">
                            <img src="{{ $data['image_url'] }}" alt="Bank" class="me-3"
                                style="width: 200px; height: 100px;">
                        </div>
                        <div class="col-md-6 text-light depo border border-secondary d-flex p-4">
                            <div class="">
                                <h5 class="mb-0 text-white">{{ $data['currency_symbol'] }}{{ $data['amount'] }}</h5>
                                <small class="text-secondary">Deposit amount</small>
                            </div>
                            <div class="px-3">
                                <h5 class="mb-0 text-white">instantly</h5>
                                <small class="text-secondary">Processing time</small>
                            </div>

                        </div>
                    </div>
                    <div class="warning-box  text-light px-3 py-2">
                        <p>In order to get your {{ Str::title($data['method']) }} payment processed
                            automatically:</p>
                        <ol>
                            <li>The exact {{ $data['currency_code'] }} amount should reach the specified address
                            </li>
                            <li>Use only {{ Str::title($data['method']) }}network for your transfer</li>
                            <li>Generate a new payment form for each new deposit</li>
                        </ol>
                        <p class="warning-text mb-0">Failure to meet one of the requirements will result in the loss
                            of funds.</p>
                    </div>
                    <div class="mb-4 mt-4">
                        <p class="text-secondary mb-2">To complete the payment, please transfer</p>
                        <div class="input-dark d-flex justify-content-between align-items-center">
                            <span class="text-white amount">
                                ({{ $data['currency_symbol'] }}{{ number_format((float)$data['amount'], 2) }})
                            </span>
                            <button class="copy-btn"
                                onclick="copyToClipbd('{{ $data['currency_symbol'] }}{{ number_format((float)$data['amount'], 2) }}')">
                                <i class="far fa-copy"></i> Copy
                            </button>
                        </div>
                    </div>


                    <div class="mb-4">
                        <p class="text-secondary mb-2">to the address via {{ Str::title($data['method']) }} network
                        </p>
                        <div class="input-dark d-flex justify-content-between align-items-center">
                            <span class="text-white address" style="font-size: 0.9em;">{{ $data['wallet'] }}</span>
                            <button class="copy-btn" onclick="copyToClipboard('{{ $data['wallet'] }}', this)">
                                <i class="far fa-copy"></i> <span>Copy</span>
                            </button>
                        </div>

                    </div>
                </div>
                <div class="row d-md-flex justify-content-center align-items-center qr px-3">
                    <div class="col-6 item">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($data['wallet']) }}"
                            width="140" height="140" alt="qrcode">

                    </div>
                    <div class="col-6 text-secondary item">
                        <p>Or simply scan the generated Qr code to make your payment.
                        </p>
                    </div>
                </div>
                </form>
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
        // Copy icon
        <script>
    function copyToClipboard(text, button) {
        navigator.clipboard.writeText(text).then(() => {
            // Change button text to "Copied"
            const buttonText = button.querySelector('span');
            buttonText.textContent = 'Copied';

            // Optional: Reset back to "Copy" after a short delay
            setTimeout(() => {
                buttonText.textContent = 'Copy';
            }, 2000); // 2 seconds
        }).catch((err) => {
            console.error('Failed to copy:', err);
        });
    }
    </script>

</body>

</html>