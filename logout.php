<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
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

        #logout-message {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin: 0;
            padding-bottom: 10px;
        }

        a {
            color: blueviolet;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        p,h2{
            color: blueviolet;
        }
    </style>
</head>
<body>
    <div id="logout-message">
        <h2>See you</h2>
        <p>You have been logged out.</p>
        <a href="login.php">Login again</a>
    </div>
</body>
</html>
