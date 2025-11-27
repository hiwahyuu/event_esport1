<?php
include "../core/config.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: admin_dashboard.php");
    exit;
}

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM peserta WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$peserta = $result->fetch_assoc();
$stmt->close();

if (!$peserta) {
    echo '<!DOCTYPE html><html lang="id"><head><title>Data Tidak Ditemukan</title><style>body { background-color: #1a1e24; color: #e74c3c; font-family: Arial, sans-serif; padding: 30px; } a { color: #f39c12; text-decoration: none; }</style></head><body><p>Data peserta tidak ditemukan!</p><a href="admin_dashboard.php">← Kembali ke Dashboard</a></body></html>';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama']);
    $kontak = trim($_POST['kontak']);
    $event = trim($_POST['event']);

    $update = $conn->prepare("UPDATE peserta SET nama = ?, kontak = ?, event = ? WHERE id = ?");
    $update->bind_param("sssi", $nama, $kontak, $event, $id);
    $update->execute();
    $update->close();

    $_SESSION['notif'] = "Data peserta '{$nama}' berhasil diperbarui!";
    
    header("Location: admin_dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peserta | Admin</title>
    <style>
        body { 
            background-color: #1a1e24; 
            color: #ecf0f1; 
            font-family: Arial, sans-serif; 
            padding: 30px; 
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .form-container {
            width: 100%;
            max-width: 500px; 
        }

        h2 { 
            color: #f39c12; 
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 25px; 
            text-shadow: 0 0 8px rgba(243, 156, 18, 0.5);
            text-align: center;
        }

        form { 
            background-color: #2c3e50; /
            padding: 30px; 
            border-radius: 10px; 
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.7);
            border: 2px solid #3498db; 
            width: 100%; 
            box-sizing: border-box;
        }

        label { 
            display:block; 
            margin-top:15px; 
            margin-bottom:5px; 
            font-weight: bold;
            color: #ffffff;
        }

        input[type=text] { 
            width:100%; 
            padding:10px; 
            border-radius:5px; 
            border: 1px solid #34495e;
            background-color: #34495e; 
            color: #ecf0f1;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        
        input[type=text]:focus {
            border-color: #3498db; 
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.7);
        }

        input[type=submit] { 
            width: 100%;
            margin-top:25px; 
            padding:12px; 
            border-radius:5px; 
            border:none; 
            background-color:#2ecc71; 
            color:#fff; 
            font-size: 1.1em;
            font-weight:bold; 
            cursor:pointer;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        input[type=submit]:hover { 
            background-color:#27ae60; 
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(46, 204, 113, 0.5);
        }

        a.back { 
            display:inline-block; 
            margin-top:25px; 
            color:#f39c12;
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            border: 1px solid transparent;
            border-radius: 5px;
        }
        a.back:hover { 
            text-decoration: underline; 
            color: #e67e22;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>🛠️ Edit Data Peserta</h2>

    <form method="POST">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($peserta['nama']) ?>" required>

        <label>Kontak (WA/HP)</label>
        <input type="text" name="kontak" value="<?= htmlspecialchars($peserta['kontak']) ?>" required>

        <label>Event</label>
        <input type="text" name="event" value="<?= htmlspecialchars($peserta['event']) ?>" required>

        <input type="submit" value="UPDATE DATA">
    </form>

    <a href="admin_dashboard.php" class="back">← Kembali ke Dashboard</a>
</div>

</body>
</html>