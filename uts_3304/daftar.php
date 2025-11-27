<?php
include "core/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama   = $conn->real_escape_string($_POST['nama']);
    $kontak = $conn->real_escape_string($_POST['kontak']);
    $event  = $conn->real_escape_string($_POST['event']);

    $sql = "INSERT INTO peserta (nama, kontak, event) VALUES ('$nama', '$kontak', '$event')";
    $q = $conn->query($sql);

    if (!$q) {
        die("Query Error: " . $conn->error); 
    }

    header("Location: sukses.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Daftar Event</title>
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

        .main-content {
            padding: 20px;
            max-width: 450px;
            width: 100%;
        }

        h2 {
            color: #2ecc71;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 30px;
            font-size: 2em;
            text-align: center;
            text-shadow: 0 0 8px rgba(46, 204, 113, 0.5);
        }

        form {
            background-color: #2c3e50;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
            border: 2px solid #3498db;
            width: 100%;
            box-sizing: border-box;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #ffffff;
            font-size: 0.95em;
        }

        input[type="text"], select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #34495e;
            border-radius: 5px;
            background-color: #34495e;
            color: #ecf0f1;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, select:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.7);
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #e74c3c;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4);
        }

    </style>
</head>
<body>

    <div class="main-content">
        <h2>Pendaftaran Event E-Sport</h2>

        <form method="POST">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="kontak">Nomor Kontak (WA/HP):</label>
            <input type="text" id="kontak" name="kontak" required>

            <label for="event">Pilih Event:</label>
            <select id="event" name="event" required>
                <option value="" disabled selected>-- Pilih salah satu Event --</option>
                <option value="Mobile Legends">Mobile Legends</option>
                <option value="Free Fire">Free Fire</option>
                <option value="PUBG Mobile">PUBG Mobile</option>
                <option value="Valorant">Valorant</option>
            </select>

            <button type="submit">🎮 DAFTAR SEKARANG 🎮</button>
        </form>
    </div>

</body>
</html>
