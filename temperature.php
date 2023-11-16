<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Temperature Converter</title>
</head>
<body>
    <header>
        <h1><a href="index.php">Universal converter</a></h1>
        <a href="index.php"><img src="./images/icons8-home.gif" alt="home"></a>
    </header>
    <h2>Converter Celsius and Fahrenheit</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="temperature">Temperature:</label> 
        <input type="text" name="temperature" id="temperature" required><br>
        <label for="from_unit">From Unit:</label>
        <select name="from_unit" id="from_unit" required>
            <option value="celsius">Celsius</option>
            <option value="fahrenheit">Fahrenheit</option>
        </select>
        <label for="to_unit">To Unit:</label>
        <select name="to_unit" id="to_unit" required>
            <option value="fahrenheit">Fahrenheit</option>
            <option value="celsius">Celsius</option>            
        </select><br>
        <button type="submit">Convert</button>
    </form>
    
    <section>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $temperature = floatval($_POST["temperature"]);
            $from_unit = $_POST["from_unit"];
            $to_unit = $_POST["to_unit"];

            if ($from_unit === "celsius" && $to_unit === "fahrenheit") {
                $result = ($temperature * 9 / 5) + 32;
            } elseif ($from_unit === "fahrenheit" && $to_unit === "celsius") {
                $result = ($temperature - 32) * 5 / 9;
            } else {
                $result = $temperature;
            }

            echo "<p>$temperature $from_unit is equal to $result $to_unit</p>";
        }
        ?>
    </section>

    <footer>
        <p>&copy; 2023</p>
    </footer>
</body>
</html>
