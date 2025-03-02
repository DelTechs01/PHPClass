<?php
#Web Based Program that collects and stores data in a MySQL
#Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formData";
#Creating the connection with database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
    die("Connection Failed" . $conn -> connect_error);
}

#Processing form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = trim(htmlspecialchars($_POST['first_name']));
    $last_name = trim(htmlspecialchars($_POST['last_name']));
    $gender = trim(htmlspecialchars($_POST['gender']));
    $address = trim(htmlspecialchars($_POST['address']));
    $email = trim(htmlspecialchars($_POST['email']));
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email Format");
    }
    $stmt = $conn -> prepare("INSERT INTO users (first_name, last_name, gender, address, email) VALUES (?, ?, ?, ?, ?)");
    $stmt -> bind_param("sssss", $first_name, $last_name, $gender, $address, $email);
    if ($stmt -> execute()) {
        $stmt -> close();
        $conn -> close();
        header("Location: " . $_SERVER['PHP_SELF'] ."?status = success");
        exit();
    }else {
        echo "<p>Error in Adding User:" . $conn -> error . "</p>";
    }
    $stmt -> close();
 }
$conn -> close();
?>

<!-- Form for Adding the data to the database -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storing Form Data in the Database.</title>
 </head>
 <body>
    <h2>Storing Form Data in Database</h2>
    <form action="" method="POST">
        <label for="first_name">FirstName:</label>
        <input type="text" name="first_name" required><br><br>

        <label for="last_name">LastName:</label>
        <input type="text" name="last_name" required><br><br>

        <label for="gender">Gender:</label>
        <input type="text" name="gender" required><br><br>

        <label for="address">Address:</label>
        <input type="text" name="address" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <input type="submit" value="Submit">
    </form>
 </body>
 </html>