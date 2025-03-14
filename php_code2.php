<?php
#Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form_db";

#Creating the Connection with the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$errors = [];

#Processing form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim(htmlspecialchars($_POST['username']));
    $password = trim(htmlspecialchars($_POST['password']));
    $user_type = trim(htmlspecialchars($_POST['user_type']));
    $display_name = trim(htmlspecialchars($_POST['display_name']));
    $address = trim(htmlspecialchars($_POST['address']));
    $email = trim(htmlspecialchars($_POST['email']));

    # Validating the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid Email";
    }

    # Validating gender
    if (!isset($_POST['gender'])) {
        $errors[] = "Please Select Gender";
    } else {
        $gender = htmlspecialchars($_POST['gender']);
    }

    # Validating the agree to terms checkbox
    if (!isset($_POST['agree_to_terms'])) {
        $errors[] = "You must agree to terms in order to proceed";
    } else {
        $agree_to_terms = htmlspecialchars($_POST['agree_to_terms']);
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO reg_details (username, password, user_type, display_name, address, email, gender, agree_to_terms) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $username, $password, $user_type, $display_name, $address, $email, $gender, $agree_to_terms);
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            header("Location: " . $_SERVER['PHP_SELF'] . "?status=success");
            exit();
        } else {
            echo "<p>Error in adding registration details: " . $conn->error . "</p>";
        }
        $stmt->close();
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form action="" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password</label>
        <input type="password" name="password" required><br><br>
        
        <label for="user_type">User Type</label>
        <select name="user_type" id="user_type">
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select><br><br>

        <label for="display_name">Display Name</label>
        <input type="text" name="display_name" required><br><br>

        <label for="address">Address</label>
        <input type="text" name="address"><br><br>

        <label for="email">Email</label>
        <input type="email" name="email" required><br><br>

        <label for="gender">Gender</label>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female<br><br>

        <input type="radio" name="agree_to_terms" value="yes" required> I accept Terms and Conditions<br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
