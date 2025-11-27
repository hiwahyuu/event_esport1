<?php include "core/config.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event E-Sport Tournament</title>
    <style>
        body {
            background: url('uploads/background1.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #ecf0f1;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
        }

        .container {
            background-color: rgba(26, 30, 36, 0.9);
            padding: 40px 60px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            border: 3px solid #e74c3c;
            max-width: 90%;
            width: 500px;
        }

        h2 {
            color: #e74c3c;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
            font-size: 2.5em;
            text-shadow: 0 0 10px rgba(231, 76, 60, 0.7);
        }

        .subtitle {
            display: block;
            font-size: 0.8em;
            margin-top: 5px;
            letter-spacing: 4px;
            color: #f39c12;
        }
        
        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-daftar {
            background-color: #2ecc71;
            color: #ffffff;
            border: 2px solid #27ae60;
        }

        .btn-daftar:hover {
            background-color: #27ae60;
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(46, 204, 113, 0.8);
        }

        .btn-admin {
            background-color: #f39c12;
            color: #ffffff;
            border: 2px solid #e67e22;
        }

        .btn-admin:hover {
            background-color: #e67e22;
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(243, 156, 18, 0.8);
        }

        .separator {
            color: #ecf0f1;
            font-size: 1.5em;
            margin: 0 15px;
            vertical-align: middle;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>
            🔥 DAFTAR EVENT
            <span class="subtitle">E-SPORT 🔥</span>
        </h2>
        
        <a href="daftar.php" class="btn-daftar">Daftar Event</a> 
        <span class="separator">|</span>
        <a href="admin/admin_login.php" class="btn-admin">Login Admin</a>
        
    </div>
</body>
</html>
