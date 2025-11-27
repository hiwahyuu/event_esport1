<?php

include "../core/config.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil input
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT user_id, username, password, role FROM users WHERE username=?");
    
    if ($stmt === false) {
        $error = "Database error: " . $conn->error;
    } else {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res && $row = $res->fetch_assoc()) {
            if (password_verify($password, $row['password'])) {
                // Login Sukses
                $_SESSION['admin'] = $row['username'];
                header("Location: admin_dashboard.php");
                exit;
            } else {
                $error = "Username atau Password salah!";
            }
        } else {
            $error = "Username atau Password salah!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin E-Sport</title>
    <style>
        body {
            background-color: #1a1e24; 
            color: #ecf0f1;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-box {
            background-color: #2c3e50; 
            padding: 40px 50px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.7);
            border: 2px solid #f39c12; /* Border Oranye */
            max-width: 380px;
            width: 90%;
            box-sizing: border-box;
            text-align: center;
        }

        h2 {
            color: #f39c12; /* Oranye */
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 25px;
            font-size: 2em;
            text-shadow: 0 0 10px rgba(243, 156, 18, 0.6);
        }
        
        .error {
            color: #e74c3c; 
            background-color: rgba(192, 57, 43, 0.2);
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #e74c3c;
            display: block;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #34495e;
            border-radius: 5px;
            background-color: #34495e;
            color: #ecf0f1;
            box-sizing: border-box;
            transition: border-color 0.3s;
            font-size: 1em;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #f39c12; 
            outline: none;
            box-shadow: 0 0 5px rgba(243, 156, 18, 0.7);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #3498db; /* Biru */
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        button:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.5);
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>     LOGIN ADMINISTRATOR</h2>
        
        <?php 
        if (!empty($error)) {
            echo '<span class="error">' . htmlspecialchars($error) . '</span>';
        } 
        ?>

        <form method="post">
            <input type="text" name="username" placeholder="Username Admin" required>
            <input type="password" name="password" placeholder="Password Admin" required>
            <button type="submit">LOGIN</button>
        </form>
    </div>
</body>
</html>