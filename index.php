<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A simple all-in-one tool for conversion between diverse units, currencies, and measurements.">
    <link rel="stylesheet" href="style.css">
    <title>Universal converter</title>
</head>
<body>
    <header>
        <h1><a href="index.php">Universal converter</a></h1>
    </header>
    <h2>Select a conversion type</h2>
    <main class="container">
        <div class="card">
            <a href="currency.php">
                <img src="./images/currency.webp" alt="currency">
                <p>Convert Currencies</p>
            </a>
        </div>
        <div class="card">
            <a href="temperature.php">
                <img src="./images/temperature.webp" alt="temperature">
                <p>Convert temperatures</p>
            </a>
        </div>
        <div class="card">
            <a href="convert_weights_masses.php">
                <img src="./images/kilo.webp" alt="kilo">
                <p>Convert Weight</p>
            </a>
        </div>
        <div class="card">
            <a href="purchase_calculator.php">
                <img src="./images/purchase.webp" alt="purchase">
                <p>Purchase calculator</p>
            </a>
        </div>
    </main>
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="white-text">Track all markets on TradingView</span></a></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
        {
        "symbols": [
            {
            "description": "",
            "proName": "OANDA:EURUSD"
            },
            {
            "description": "",
            "proName": "OANDA:GBPUSD"
            },
            {
            "description": "",
            "proName": "FX:USDJPY"
            },
            {
            "description": "",
            "proName": "FX:AUDUSD"
            },
            {
            "description": "",
            "proName": "FX:GBPJPY"
            },
            {
            "description": "",
            "proName": "FX:USDCAD"
            },
            {
            "description": "",
            "proName": "FX:USDJPY"
            },
            {
            "description": "",
            "proName": "FX:NZDUSD"
            },
            {
            "description": "",
            "proName": "FX:USDCHF"
            },
            {
            "description": "",
            "proName": "FX:GBPCAD"
            }
        ],
        "showSymbolLogo": true,
        "colorTheme": "light",
        "isTransparent": false,
        "displayMode": "adaptive",
        "locale": "en"
        }
    </script>
    </div>
    <!-- TradingView Widget END -->
    <footer>
        <p>&copy; 2023</p>
    </footer>
</body>
</html>