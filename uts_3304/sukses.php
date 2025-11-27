<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil</title>
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
            text-align: center;
        }

        .success-box {
            background-color: #2c3e50;
            padding: 50px 70px;
            border-radius: 15px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.6);
            border: 3px solid #2ecc71;
            max-width: 400px;
            width: 90%;
        }

        h2 {
            color: #2ecc71;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 25px;
            font-size: 2.5em;
            text-shadow: 0 0 15px rgba(46, 204, 113, 0.7);
        }
        
        .message {
            font-size: 1.1em;
            margin-bottom: 30px;
            color: #ffffff;
        }

        a {
            text-decoration: none;
            background-color: #f39c12;
            color: #ffffff;
            font-weight: bold;
            padding: 12px 25px; 
            border-radius: 8px;
            transition: all 0.3s ease;
            display: inline-block;
            border: 2px solid #e67e22;
        }

        a:hover {
            background-color: #e67e22;
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(243, 156, 18, 0.8);
        }

    </style>
</head>
<body>
    <div class="success-box">
        <h2> Pendaftaran Berhasil! </h2>
        
        <p class="message">
            Terima kasih telah mendaftar. Data Anda telah kami simpan.<br> 
            Kami akan menghubungi Anda melalui kontak yang terdaftar untuk informasi selanjutnya.
        </p>
        
        <a href="index.php">Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
