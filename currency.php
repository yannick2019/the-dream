<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A simple all-in-one tool for conversion between diverse units, currencies, and measurements.">
    <link rel="stylesheet" href="style.css">
    <title>Currency convert</title>
</head>
<body>
    <header>
        <h1><a href="index.php">Universal converter</a></h1>
        <a href="index.php"><img src="./images/icons8-home-light.png" alt="home"></a>
    </header>

    <h2 class="heading-currency">Currency converter</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="from">From</label>
            <select name="from" id="from">
                <option value="USD">Dollar américain (USD)</option>
                <option value="EUR">Euro (EUR)</option>
                <option value="GBP">Livre britanique (GBP)</option>
                <option value="XAF">Franc CFA d'Afrique Centrale (XAF)</option>
                <option value="UAH">Hryvnia ukrainienne (UAH)</option>
                <option value="JPY">JPY</option>
                <option value="AUD">AUD</option>
                <option value="CAD">CAD</option>
                <option value="CHF">CHF</option>
                <option value="CNY">CNY</option>
                <option value="SEK">SEK</option>
                <option value="NZD">NZD</option>
                <option value="NOK">NOK</option>
                <option value="MXN">MXN</option>
                <option value="SGD">SGD</option>
                <option value="HKD">HKD</option>
                <option value="KRW">KRW</option>
                <option value="TRY">TRY</option>
                <option value="INR">INR</option>
                <option value="BAM">BAM</option>
                <option value="BRL">BRL</option>
            </select>
        </div>
        <div>
            <label for="to">To</label>
            <select name="to" id="to">
                <option value="EUR">Euro (EUR)</option>
                <option value="USD">Dollar américain (USD)</option>
                <option value="GBP">Livre britanique (GBP)</option>
                <option value="XAF">Franc CFA d'Afrique Centrale (XAF)</option>
                <option value="UAH">Hryvnia ukrainienne (UAH)</option>
                <option value="JPY">JPY</option>
                <option value="AUD">AUD</option>
                <option value="CAD">CAD</option>
                <option value="CHF">CHF</option>
                <option value="CNY">CNY</option>
                <option value="SEK">SEK</option>
                <option value="NZD">NZD</option>
                <option value="NOK">NOK</option>
                <option value="MXN">MXN</option>
                <option value="SGD">SGD</option>
                <option value="HKD">HKD</option>
                <option value="KRW">KRW</option>
                <option value="TRY">TRY</option>
                <option value="INR">INR</option>
                <option value="BAM">BAM</option>
                <option value="BRL">BRL</option>
            </select>
        </div>
        <div>
            <label for="amount">Montant</label>
            <input name="amount">
        </div>
        <button type="submit">Convertir</button>

        <?php 

        $error = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            function filter_input_amount($input){
                $input = trim($input);
                $sanitizedInput = filter_var($input, FILTER_VALIDATE_FLOAT);
                if ($sanitizedInput == false) {
                    return false;
                } else {
                    return $sanitizedInput;
                }
            }

            if (!empty($_POST["amount"])) {
                $from = $_POST["from"];
                $to = $_POST["to"];
                $amount = filter_input_amount($_POST["amount"]);

                if ($amount == false) {
                    $error["error"] = "Veuillez saisir une valeur correcte!";
                } else {
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://open.er-api.com/v6/latest/{$from}",
                        CURLOPT_RETURNTRANSFER => 1
                    ));
                    $response = curl_exec($curl);
                    $response = json_decode($response, true);
                    $rate = $response["rates"][$to];
        
                    $total = $rate * $amount;
        
                    echo "<p style='font-size: 1.6rem'>{$amount} {$from} égal</p>";
                    echo "<p style='font-size: 2rem';>{$total} {$to}</p>";
                }            

            } else {
                $error["error"] = "Veuillez saisir une valeur correcte!";
            }
        }

        ?>

        <?php if ($error): ?>
            <p style='color: red;'><?= $error["error"] ?></p>
        <?php endif ?>
    </form>

    <footer>
        <p>&copy; 2023</p>
    </footer>
</body>
</html>