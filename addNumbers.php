<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sum of two Numbers:</title>
</head>
<body>
    <form action="" method="POST">
        <label for="num1">Enter First Number:</label>
        <input type="number" id="num1" name="num1"><br><br>

        <label for="num2">Enter the Second Number:</label>
        <input type="number" id="num2" name="num2" ><br><br>

        <button type="submit">Add</button>
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        $sum = $num1 + $num2;
        echo "<h2>The sum of $num1 and $num2 is: $sum</h2>";
    }
    ?>
</body>
</html>