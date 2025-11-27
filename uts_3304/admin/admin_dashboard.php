<?php
include "../core/config.php";

if (!isset($_SESSION['admin'])) { 
    header("Location: admin_login.php"); 
    exit; 
}

$peserta = $conn->query("SELECT * FROM peserta ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin E-Sport</title>
<style>
body {
    background-color: #1a1e24; 
    color: #ecf0f1;
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 30px;
}
.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    padding: 0 10px;
}
h2 {
    color: #f39c12; 
    text-transform: uppercase;
    letter-spacing: 3px;
    font-size: 2.2em;
    text-shadow: 0 0 8px rgba(243, 156, 18, 0.5);
    margin: 0;
}
h3 {
    color: #3498db; 
    margin-top: 30px;
    margin-bottom: 15px;
    border-bottom: 2px solid #3498db;
    padding-bottom: 5px;
    display: inline-block;
}
.btn-logout, .btn-edit, .btn-hapus {
    text-decoration: none;
    font-weight: bold;
    padding: 6px 12px;
    border-radius: 5px;
    transition: all 0.3s ease;
    display: inline-block;
    border: 1px solid transparent;
    font-size: 0.9em;
}
.btn-logout {
    background-color: #e74c3c; 
    color: #ffffff;
    border-color: #c0392b;
}
.btn-logout:hover { background-color: #c0392b; box-shadow: 0 0 10px rgba(231,76,60,0.5);}
.btn-edit {
    background-color: #3498db;
    color: #fff;
    border-color: #2980b9;
}
.btn-edit:hover { background-color: #2980b9;}
.btn-hapus {
    background-color: #e67e22;
    color: #fff;
    border-color: #d35400;
}
.btn-hapus:hover { background-color: #d35400;}
table {
    width: 100%;
    border-collapse: collapse; 
    background-color: #2c3e50; 
    box-shadow: 0 5px 15px rgba(0,0,0,0.5);
    border-radius: 5px;
    overflow: hidden; 
}
th {
    background-color: #34495e;
    color: #f39c12;
    padding: 12px;
    text-align: left;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-bottom: 2px solid #3498db;
}
td {
    padding: 10px 12px;
    border-bottom: 1px solid #34495e; 
    color: #ecf0f1;
}
tr:nth-child(even) { background-color: #34495e; }
tr:hover { background-color: #3e566e; }
</style>
</head>
<body>

<div class="header-container">
    <h2> Dashboard Administrator</h2>
    <a href="admin_logout.php" class="btn-logout">Logout</a>
</div>

<div class="data-container">
    <h3>List Peserta Terdaftar</h3>
    <table border="0" cellpadding="0" cellspacing="0"> 
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kontak</th>
                <th>Event</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($peserta->num_rows > 0): ?>
            <?php while($r = $peserta->fetch_assoc()): ?>
            <tr>
                <td><?= $r['id'] ?></td>
                <td><?= htmlspecialchars($r['nama']) ?></td>
                <td><?= htmlspecialchars($r['kontak']) ?></td>
                <td><?= htmlspecialchars($r['event']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $r['id'] ?>" class="btn-edit">Edit</a> 
                    <a href="hapus.php?id=<?= $r['id'] ?>" class="btn-hapus" onclick="return confirm('Yakin ingin hapus peserta ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align:center; color:#e74c3c; padding:20px;">Belum ada peserta terdaftar.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
