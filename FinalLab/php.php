<?php
session_start();

if (isset($_POST['register'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    setcookie('username', $username, time() + (86400 * 30), "/");
    $_SESSION['username'] = $username;
}

if (isset($_POST['logout'])) {
    setcookie('username', '', time() - 3600, "/");
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demon Slayer Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1b1b1b;
            color: #e0e0e0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container, .welcome-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            margin-bottom: 30px;
            width: 100%;
            max-width: 350px;
        }

        .form-container h1 {
            color: #e63946;
            margin-bottom: 15px;
            font-size: 1.5em;
        }

        .form-container input[type="text"] {
            padding: 12px;
            margin-top: 10px;
            border-radius: 5px;
            border: none;
            width: calc(100% - 24px);
            font-size: 1em;
            box-sizing: border-box;
        }

        .form-container button, .welcome-container button {
            padding: 10px;
            background-color: #e63946;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 1em;
            width: 100%;
            margin-top: 10px;
        }

        .form-container button:hover, .welcome-container button:hover {
            background-color: #b52733;
        }

        .welcome-container h2 {
            color: #e63946;
        }

        .container {
            margin: 100px 0 0 0;
            width: 70%;
            height: 700px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .container img {
            width: 10%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid rgba(255, 255, 255, 0.684);
            transition: all ease-in-out 0.5s;
        }

        .container img:hover {
            width: 50%;
        }
    </style>
</head>
<body>

    <?php if (!isset($_SESSION['username'])): ?>
        <div class="form-container">
            <h1>DEMON SLAYER</h1>
            <form method="post">
                <input type="text" name="username" required placeholder="Enter your username">
                <button type="submit" name="register">Register</button>
            </form>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['username'])): ?>
        <div class="welcome-container">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <form method="post">
                <button type="submit" name="logout">Logout</button>
            </form>
        </div>
       
        <div class="container">
            <img src="tanjiro.jpg">
            <img src="nezuko.jpg" >
            <img src="zenitsu.jpg">
            <img src="inosuke.jpg">
            <img src="tanji.jpg">
        </div>
    <?php endif; ?>

</body>
</html>
