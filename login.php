<?php
session_start();

$servername = "mysql01-srv";
$username = "root";
$password = "mysql100";
$dbname = "database"; // Replace with your actual database name

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $useremail = mysqli_real_escape_string($conn, $_POST['username']);
    $userpass = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM login WHERE username='$useremail' AND password='$userpass'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $useremail;
        header("Location: dashboard.php"); // Redirect to dashboard page
        exit;
    } else {
        $message = "Login failed. Please check your credentials.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <style>
        body {
            background-color: blueviolet;
        }

        #form {
            background-color: rgb(255, 255, 255);
            width: 25%;
            border-radius: 4px;
            margin: 120px auto;
            padding: 50px;
            box-shadow: 10px 10px 5px rgb(82, 11, 77);
        }

        #form label {
            display: block;
            margin-bottom: 10px;
        }

        #form input[type="text"],
        #form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #btn {
            color: rgb(255, 255, 255);
            background-color: rgb(108, 22, 189);
            padding: 10px;
            font-size: large;
            border-radius: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="form">
        <h2>User Login</h2>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <br>
            <input type="submit" value="Login" id="btn">
        </form>
        <?php echo isset($message) ? $message : ''; ?>
    </div>
</body>
</html>
