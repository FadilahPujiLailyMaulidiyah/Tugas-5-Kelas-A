<?php
session_start();

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["nama"] = $_POST["nama"];
    $_SESSION["ttl"] = $_POST["ttl"];
    $_SESSION["telepon"] = $_POST["telepon"];
    $_SESSION["linkedin"] = $_POST["linkedin"];
    $_SESSION["alamat"] = $_POST["alamat"];
    $_SESSION["gelar_pendidikan"] = $_POST["gelar_pendidikan"];
    $_SESSION["pendidikan"] = $_POST["pendidikan"];
    $_SESSION["prestasi"] = $_POST["prestasi"];
    $_SESSION["keahlian"] = $_POST["keahlian"];
    $_SESSION["deskripsi_diri"] = $_POST["deskripsi_diri"];

    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true);
    }

    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
        $foto_path = "uploads/" . basename($_FILES["foto"]["name"]);
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $foto_path)) {
            $_SESSION["foto"] = $foto_path;
        } else {
            $_SESSION["foto"] = "default-avatar.png";
        }
    } else {
        $_SESSION["foto"] = "default-avatar.png";
    }

    header("Location: cv.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form CV</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #d9eefa; text-align: center; padding: 50px; }
        .container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); width: 400px; margin: auto; text-align: left; }
        h2 { text-align: center; }
        input, textarea { width: 94%; padding: 10px; margin-top: 5px; border-radius: 5px; border: 1px solid #ccc; }
        button { background-color: #007BFF; color: white; padding: 14px; width: 100%; border: none; border-radius: 5px; cursor: pointer; margin-top: 10px; font-size: 1.1em; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form CV</h2>
        <form action="form.php" method="post" enctype="multipart/form-data">
            <label>Foto Profil:</label>
            <input type="file" name="foto" accept="image/*" required>
            <label>Nama Lengkap:</label>
            <input type="text" name="nama" required>
            <label>Tempat, Tanggal Lahir:</label>
            <input type="text" name="ttl" required>
            <label>Nomor Telepon:</label>
            <input type="text" name="telepon" required>
            <label>LinkedIn:</label>
            <input type="text" name="linkedin">
            <label>Alamat:</label>
            <input type="text" name="alamat" required>
            <label>Gelar Pendidikan:</label>
            <input type="text" name="gelar_pendidikan" required>
            <label>Riwayat Pendidikan:</label>
            <textarea name="pendidikan" required></textarea>
            <label>Prestasi dan Kompetisi:</label>
            <textarea name="prestasi"></textarea>
            <label>Keahlian:</label>
            <textarea name="keahlian"></textarea>
            <label>Deskripsi Diri:</label>
            <input type="text" name="deskripsi_diri" required>
            <button type="submit">Create CV</button>
        </form>
    </div>
</body>
</html>
