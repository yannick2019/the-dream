<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A simple all-in-one tool for conversion between diverse units, currencies, and measurements.">
    <link rel="stylesheet" href="style.css">
    <title>Convert weights, masses</title>
</head>
<body>
    <header>   
        <h1><a href="index.php">Universal converter</a></h1>
        <a href="index.php"><img src="./images/icons8-home-light.png" alt="home"></a>
    </header>

    <h2>Convert Weight</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="valeur">Value: </label>
        <input type="text" name="valeur" id="valeur">
        <select name="uniteInitiale">
            <option value="kilogrammes">Kilogrammes</option>
            <option value="grammes">Grammes</option>
            <option value="milligrammes">Milligrammes</option>
            <option value="tonnes">Tonnes</option>
        </select>
        <label for="">Convert to:</label>
        <select name="uniteCible">
            <option value="grammes">Grammes</option>
            <option value="kilogrammes">Kilogrammes</option>
            <option value="milligrammes">Milligrammes</option>
            <option value="tonnes">Tonnes</option>
        </select>
        <button type="submit">Convert</button>

        <?php

        function grammesVersKilogrammes($grammes) {
            return $grammes / 1000;
        }

        function kilogrammesVersGrammes($kilogrammes) {
            return $kilogrammes * 1000;
        }

        function milligrammesVersGrammes($milligrammes) {
            return $milligrammes / 1000;
        }

        function tonnesVersKilogrammes($tonnes) {
            return $tonnes * 1000;
        }

        function kilogrammesVersTonnes($kilogrammes) {
            return $kilogrammes / 1000;
        }

        $error = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (!empty($_POST["valeur"])) {
                $valeur = $_POST["valeur"];
                $uniteInitiale = $_POST["uniteInitiale"];
                $uniteCible = $_POST["uniteCible"];
                $resultat = 0;
    
                switch ($uniteInitiale) {
                    case "grammes":
                        switch ($uniteCible) {
                            case "grammes":
                                $resultat = $valeur;
                                break;
                            case "kilogrammes":
                                $resultat = grammesVersKilogrammes($valeur);
                                break;
                            case "milligrammes":
                                $resultat = milligrammesVersGrammes($valeur);
                                break;
                            case "tonnes":
                                $resultat = kilogrammesVersTonnes(grammesVersKilogrammes($valeur));
                                break;
                        }
                        break;
                    case "kilogrammes":
                        switch ($uniteCible) {
                            case "grammes":
                                $resultat = kilogrammesVersGrammes($valeur);
                                break;
                            case "kilogrammes":
                                $resultat = $valeur;
                                break;
                            case "milligrammes":
                                $resultat = kilogrammesVersGrammes(milligrammesVersGrammes($valeur));
                                break;
                            case "tonnes":
                                $resultat = kilogrammesVersTonnes($valeur);
                                break;
                        }
                        break;
                    case "milligrammes":
                        switch ($uniteCible) {
                            case "grammes":
                                $resultat = milligrammesVersGrammes($valeur);
                                break;
                            case "kilogrammes":
                                $resultat = grammesVersKilogrammes(milligrammesVersGrammes($valeur));
                                break;
                            case "milligrammes":
                                $resultat = $valeur;
                                break;
                            case "tonnes":
                                $resultat = kilogrammesVersTonnes(grammesVersKilogrammes(milligrammesVersGrammes($valeur)));
                                break;
                        }
                        break;
                    case "tonnes":
                        switch ($uniteCible) {
                            case "grammes":
                                $resultat = tonnesVersKilogrammes($valeur);
                                break;
                            case "kilogrammes":
                                $resultat = kilogrammesVersGrammes(tonnesVersKilogrammes($valeur));
                                break;
                            case "milligrammes":
                                $resultat = kilogrammesVersGrammes(milligrammesVersGrammes(tonnesVersKilogrammes($valeur)));
                                break;
                            case "tonnes":
                                $resultat = $valeur;
                                break;
                        }
                        break;
                }                        
                echo "<p style='font-size: 1.4rem'>{$valeur} {$uniteInitiale} équivaut à {$resultat} {$uniteCible}.</p>";

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
