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
    <?php
        $currencies = [
            'EUR' => 'Euro (EUR)',
            'USD' => 'Dollar américain (USD)',
            'GBP' => 'Livre britanique (GBP)',
            'XAF' => 'Franc CFA d\'Afrique Centrale (XAF)',
            'UAH' => 'Hryvnia ukrainienne (UAH)',
            'JPY' => 'Japanese Yen (JPY)',
            'AUD' => 'Australian Dollar (AUD)',
            'CAD' => 'Canadian Dollar (CAD)',
            'CHF' => 'Swiss Franc (CHF)',
            'CNY' => 'Chinese Yuan (CNY)',
            'SEK' => 'Swedish Krona (SEK)',
            'NZD' => 'New Zealand Dollar (NZD)',
            'NOK' => 'Norwegian Krone (NOK)',
            'MXN' => 'Mexican Peso (MXN)',
            'SGD' => 'Singapore Dollar (SGD)',
            'HKD' => 'Hong Kong Dollar (HKD)',
            'KRW' => 'South Korean Won (KRW)',
            'TRY' => 'Turkish Lira (TRY)',
            'INR' => 'Indian Rupee (INR)',
            'BAM' => 'Bosnia and Herzegovina Mark (BAM)',
            'BRL' => 'Brazilian Real (BRL)',
        ];
        ?>
        
        <label for="from">From</label>
        <select name="from" id="from">
            <?php foreach ($currencies as $code => $label): ?>
                <option value="<?= $code ?>"><?= $label ?></option>
            <?php endforeach; ?>
        </select>
        
        <label for="to">To</label>
        <select name="to" id="to">
            <?php foreach ($currencies as $code => $label): ?>
                <option value="<?= $code ?>"><?= $label ?></option>
            <?php endforeach; ?>
        </select>

        <label for="amount">Montant</label>
        <input name="amount">

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