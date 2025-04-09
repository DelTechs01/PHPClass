<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Rating by Code</title>
</head>
<body>
    <h2>Country Rating</h2>
    <form action="" method="POST">
        <label for="countryCode">Enter Your Country Code:</label>
        <input type="text" id="countryCode" name="countryCode" placeholder="Enter country code eg K or k">
        <button type="submit">Submit</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $countryCode = trim(htmlspecialchars($_POST['countryCode']));
        $rating = "";
        if ($countryCode == "K" || $countryCode == "k") {
            $rating = "Highly Talented Sports Man";
        } elseif ($countryCode == "I" || $countryCode == "i"){
            $rating = "Sporting affected by their Culture";
        } elseif ($countryCode == "U" || $countryCode == "u") {
            $rating = "Good in short races";
        } elseif ($countryCode == "N" || $countryCode == "n") {
            $rating = "Give a good attempt in short races";
        } else {
            $rating = "General Performance is low";
        }
        echo "The Rating of your Country is $rating\n";
     }
    ?>
</body>
</html>