<?php
session_start();

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true || !isset($_SESSION["nama"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - <?php echo $_SESSION["nama"]; ?></title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #e0dada; color: white; padding: 20px; display: flex; justify-content: center; }
        .cv-container { background-color: #2C3E50; color: black; width: 40%; padding: 25px; border-radius: 13px; }
        .header { display: flex; align-items: center; }
        .header img { width: 150px; height: 150px; border-radius: 50%; margin-right: 20px; object-fit: cover; }
        h1, h2, h3, h4 { color: #ffffff; }
        .section { margin-top: 20px; padding: 10px; border-radius: 5px; background: #f0f0f0; }
        .section h3 { color: #007BFF; }
    </style>
</head>
<body>
    <div class="cv-container">
        <div class="header">
            <img src="<?php echo $_SESSION["foto"]; ?>" alt="Foto Profil">
            <div>
                <h1><?php echo $_SESSION["nama"]; ?></h1>
                <h2><?php echo $_SESSION["gelar_pendidikan"]; ?></h2>
                <h4><?php echo nl2br($_SESSION["deskripsi_diri"]); ?></h4>
            </div>
        </div>
        <hr>
        <div class="section">
            <h3>Informasi Kontak</h3>
            <p><strong>Email:</strong> <?php echo $_SESSION["email"] ?? "Tidak tersedia"; ?></p>
            <p><strong>Telepon:</strong> <?php echo $_SESSION["telepon"]; ?></p>
            <p><strong>Tempat dan Tanggal Lahir:</strong> <?php echo $_SESSION["ttl"]; ?></p>
            <p><strong>LinkedIn:</strong> <?php echo $_SESSION["linkedin"]; ?></p>
            <p><strong>Alamat:</strong> <?php echo $_SESSION["alamat"]; ?></p>
        </div>
        <div class="section">
            <h3>Riwayat Pendidikan</h3>
            <p><?php echo nl2br($_SESSION["pendidikan"]); ?></p>
        </div>
        <div class="section">
            <h3>Prestasi dan Kompetisi</h3>
            <p><?php echo nl2br($_SESSION["prestasi"]); ?></p>
        </div>
        <div class="section">
            <h3>Keahlian</h3>
            <p><?php echo nl2br($_SESSION["keahlian"]); ?></p>
        </div>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
