<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
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
    <script>
        function showRegistrationAlert() {
            alert("Registration is complete!");
        }
    </script>
</head>
<body>
    <?php
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

        $sql = "INSERT INTO login (username, password) VALUES ('$useremail', '$userpass')";

        if ($conn->query($sql)) {
            echo '<script>showRegistrationAlert();</script>';
        }
    }

    $conn->close();
    ?>

    <div id="form">
        <h2>Register User</h2>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <br>
            <input type="submit" value="Register" id="btn">
        </form>
    </div>
</body>
</html>
