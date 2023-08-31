<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            background-color: blueviolet;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #dashboard {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin: 0;
            padding-bottom: 10px;
            color: blueviolet;
        }

        strong {
            color: blueviolet;
        }

        a {
            color: blueviolet;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
        p{
            color: blueviolet;
        }
    </style>
</head>
<body>
    <div id="dashboard">
        <h2>Welcome to the Dashboard</h2>
        <p>Hello, <strong style="color: blueviolet;"><?php echo $_SESSION['username']; ?></strong> !</p>
        <a href="logout.php">Log out</a>
    </div>
</body>
</html>
