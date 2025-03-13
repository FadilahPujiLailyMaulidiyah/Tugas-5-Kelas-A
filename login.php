<?php 
session_start();
session_unset(); 
session_destroy(); 

session_start(); 

$akun = [
    "a@gmail.com" => "gmail.com",
    "adi@ub.ac.id" => "ub.ac.id"
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (isset($akun[$email]) && $akun[$email] === $password) {
        $_SESSION["logged_in"] = true;
        $_SESSION["email"] = $email;
        header("Location: form.php");
        exit();
    } else {
        $error = "Email atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #d9eefa; 
            text-align: center; 
            padding: 50px; 
        }
        .container { 
            background: white; 
            padding: 30px; 
            border-radius: 10px; 
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); 
            width: 350px; 
            margin: auto; 
            text-align: left; 
        }
        h2 { text-align: center; }

        .input-box {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-bottom: 10px;
        }
        .input-box input { 
            border: none;
            outline: none;
            flex: 1;
            padding: 10px;
            background: transparent;
        }
        .input-box i {
            color: #777;
            margin-right: 10px;
        }
        button { 
            background-color: #007BFF; 
            color: white; 
            padding: 16px; 
            width: 100%; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            margin-top: 10px;
            font-size: 1.2em; 
        }
        .error { 
            color: red; 
            font-size: 14px; 
            text-align: center; 
        }
        .logo { 
            display: block; 
            margin: 0 auto 20px; 
            width: 100px; 
        } 
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <img src="logintugas4.png" alt="Logo Login" class="logo">
        
        <h2>ACCOUNT</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form action="login.php" method="post">
            <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="email" placeholder="Nama Pengguna / Email" required>
            </div>
            <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Kata Sandi" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
