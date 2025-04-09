<!DOCTYPE html>
<html>
<head>
    <title>CBC Level Checker</title>
</head>
<body>
    <h1>Check Your CBC Level</h1>
    <form method="POST" action="">
        <label for="grade">Enter Grade Level (1-15):</label>
        <input type="number" id="grade" name="grade" min="1" max="15" required>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $grade = intval($_POST["grade"]);
        $cbcLevel = "";

        if ($grade >= 1 && $grade <= 3) {
            $cbcLevel = "Lower Primary";
        } elseif ($grade >= 4 && $grade <= 6) {
            $cbcLevel = "Upper Primary";
        } elseif ($grade >= 7 && $grade <= 9) {
            $cbcLevel = "Junior Secondary";
        } elseif ($grade >= 10 && $grade <= 12) {
            $cbcLevel = "Senior Secondary";
        } elseif ($grade >= 13 && $grade <= 15) {
            $cbcLevel = "Higher Education";
        } else {
            $cbcLevel = "Invalid Grade Level";
        }

        echo "<h2>Your CBC Level: $cbcLevel</h2>";
    }
    ?>
</body>
</html>