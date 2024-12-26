<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment System</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #1e1e30;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 900px;
            display: flex;
            flex-wrap: wrap;
            background-color: #2c2c44;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .left,
        .right {
            padding: 20px;
            flex: 1;
        }

        .left {
            background-color: #1f1f2f;
        }

        .right {
            background-color: #2c2c44;
        }

        h2 {
            margin: 0 0 20px;
        }

        .payment-info {
            margin-bottom: 20px;
        }

        .payment-info p {
            margin: 5px 0;
            font-size: 14px;
            color: #ccc;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #29293d;
            color: #fff;
        }

        .btn {
            display: inline-block;
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .summary {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .summary p {
            margin: 10px 0;
        }

        .promo {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .promo input[type="checkbox"] {
            margin-right: 10px;
        }

        .footer-links a {
            color: #4caf50;
            text-decoration: none;
            font-size: 14px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Left Section -->
        <div class="left">
            <h2>Bank Transfer (NGN)</h2>
            <div class="payment-info">
                <p>Commission: 0%</p>
                <p>Minimum deposit amount: €4.90</p>
                <p>Max. amount per transaction: €559</p>
                <p>Processing time: ~10 min.</p>
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" placeholder="Enter amount" value="97">
            </div>
            <div class="promo">
                <input type="checkbox" id="promo-code">
                <label for="promo-code">I have a promo code</label>
            </div>
            <div class="form-group">
                <label for="first-name">First name:</label>
                <input type="text" id="first-name" placeholder="Enter your first name" value="Blues">
            </div>
        </div>

        <!-- Right Section -->
        <div class="right">
            <h2>You receive:</h2>
            <div class="summary">
                <p><strong>€97</strong></p>
                <p>+ 1 number for the New Year Celebration</p>
                <p>+ Soft Pocket Box 🎁</p>
            </div>
            <a href="#" class="btn">Continue and pay €97 (₦155,998)</a>
            <div class="footer-links">
                <p><a href="#">View our User Guide</a></p>
                <p><a href="#">Contact Support Service</a></p>
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