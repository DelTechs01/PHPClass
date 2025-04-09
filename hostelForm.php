<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Registration - Kirinyaga University.</title>
    <style>
        :root {
      --primary: #00882d;
      --primary-hover: #006c24;
      --text-dark: #333;
      --bg-light: #f4f4f4;
      --white: #fff;
    }

        * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #e6f2ea, #cde4d3);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      padding: 20px;
    }

    .container {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(10px);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      max-width: 500px;
      width: 100%;
    }
    
    .logo {
      display: flex;
      justify-content: center;
      margin-bottom: 25px;
    }

    .logo img {
      width: 140px;
      height: auto;
      filter: drop-shadow(2px 4px 6px rgba(0, 0, 0, 0.1));
    }

    .formcontainer form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    label {
      font-weight: 600;
      color: var(--text-dark);
    }

    input[type="number"],
    input[type="text"] {
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      transition: 0.3s ease;
    }

    input:focus {
      border-color: var(--primary);
      outline: none;
      box-shadow: 0 0 0 3px rgba(0, 136, 45, 0.1);
    }

    a {
      font-size: 14px;
      color: #007bff;
      text-decoration: none;
      transition: 0.3s ease;
    }

    a:hover {
      text-decoration: underline;
    }

    button {
      padding: 12px;
      background-color: var(--primary);
      color: var(--white);
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: var(--primary-hover);
    }

    @media (max-width: 500px) {
      .container {
        padding: 30px 20px;
      }

      .formcontainer form {
        gap: 12px;
      }
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="log">
            <img src="Kirinyagalogo.jpg" alt="Kirinyaga University">
        </div>
        <div class="formcontainer">
            <h2>Kirinyaga University</h2>
            <form action="adddetails.php" method="POST">
                <h3>Hostel Registration</h3>
                <label for="hostelNumber">Hostel Number :</label>
                <input type="number" id="hostelNumber" name="hostelNummber" required>

                <label for="roomNumber">Room Number :</label>
                <input type="number" name="roomNumber" id="roomNumber" required>

                <label for="regNo">Student Reg No :</label>
                <input type="text" name="regNo" id="regNo" required>

                <button type="submit">Save</button>
            </form>
        </div>
    </div>
</body>
</html>