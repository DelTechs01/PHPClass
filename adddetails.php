<?php
#Database Connection
$servername = "";
$username = "root";
$password = "";
$dbname = "hosteldb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hostelNumber = $_POST['hostelCode'];
    $roomNumber = $_POST['roomcode'];
    $regNo = $_POST['regNo'];

    $stmt = $conn->prepare("INSERT INTO hostel(hostelNumber, roomcode, regNo) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $hostelNumber, $roomNumber, $regNo);
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: " . $_SERVER['PHP_SELF'] . "?status=success");
        exit();
    } else {
        echo "<p>Error in Adding Hostel Details: " . $conn->error . "</p>";
    }
    $stmt->close();
}
$conn->close();
?>