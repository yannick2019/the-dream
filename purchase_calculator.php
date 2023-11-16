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
    <h2>Purchase calculator | Delhaize</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="montant">Montant disponible (Euro):</label>
        <input type="text" name="montant" id="montant" required>
        <button type="submit">Vérifier les achats possibles</button>

        <?php

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

            $montant = isset($_POST['montant']) ? floatval($_POST['montant']) : 0;

            $amount_sanitized = filter_input_amount($montant);

            $produits = [
                ['nom' => 'Crackers Tuc', 'prix' => 1.69],
                ['nom' => 'Pasta Meals', 'prix' => 3.89],
                ['nom' => 'Leffe | Bière 8 x 33 cl', 'prix' => 7.14],
                ['nom' => 'Vinaigrette | Ciboulette 25 cl', 'prix' => 2.75],
                ['nom' => 'Nescafé | Dolce Gusto', 'prix' => 13.45],
                ['nom' => 'Grills | Fumé | Snack 125g', 'prix' => 1.55],
                ['nom' => 'Filet de porc 475g', 'prix' => 4.73],
                ['nom' => 'Champignons Belges', 'prix' => 1.39],
                ['nom' => '12 | croissants', 'prix' => 3.35],
                ['nom' => 'Bière | Sans Alcool | Canette 6x33cl', 'prix' => 8.29],
                ['nom' => 'Pâte à tartiner | Speculoos 400 gr', 'prix' => 2.89],
            ];
    
            $tableRows = '';

            foreach ($produits as $produit) {
                if ($produit['prix'] <= $amount_sanitized) {
                    $tableRows .= "<tr><td>{$produit['nom']}</td><td>{$produit['prix']} euros</td></tr>";
                }
            }

            echo "<h3>Résultats pour un montant de {$amount_sanitized} euros :</h3><br>";

            if (!empty($tableRows)) {
                echo "
                    <table border='1' style='width: 400px;'>
                        <tr>
                            <th>Produit</th>
                            <th>Prix</th>
                        </tr>
                        {$tableRows}
                    </table>";
            } else {
                echo "<p>Désolé, aucun produit n'est disponible dans votre budget.</p>";
            }
        }

        ?>

    </form>

    <footer>
        <p>&copy; 2023</p>
    </footer>
</body>
</html>