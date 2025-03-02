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
if ($_SERVER["REQUEST_METHOD"] == $_POST) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $stmt = $conn -> prepare("INSERT INTO users (first_name, last_name, gender, address, email) VALUES (?, ?, ?, ?)");
    $stmt -> bind_param("sssss", $first_name, $last_name, $gender, $address, $email);
    if ($stmt -> execute()) {
        $stmt -> close();
        $conn -> close();
        header("Location: " . $_SERVER['PHP_SELF'] ."?status = success ");
        exit();
    }else {
        echo "<p>Error in Adding User:" . $conn -> connect_error . "</p>";
    }
    $stmt -> close();
 }
$conn -> close();
?>