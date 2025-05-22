<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style(1).css">
    <title>Movieland</title>
</head>
<body>
    <?php include "koneksi.php"; ?>
    <form method="post">
    <body style="background-color:#111111">
 <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <img src="uploads/images/movieland2 rev.png">
        </div>
       
        <div class="nav-button">
        <a href="login.php"><button class="btn white-btn" id="loginBtn">Sign In</button></a>
           <a href="signup.php"><button class="btn" id="registerBtn">Sign Up</button></a>
        </div>
    </nav>

<!----------------------------- Form box ----------------------------------->    
    <div class="form-box">
        
 <!------------------- registration form -------------------------->
 <div class="login-container" id="login">
    <p id="error_message"></p>
    <div class="two-forms">
        <div class="input-box">
            <input type="text" class="input-field" placeholder="Firstname" name="firstName">
            <i class="bx bx-user"></i>
        </div>
        <div class="input-box">
            <input type="text" class="input-field" placeholder="Lastname" name="lastName">
            <i class="bx bx-user"></i>
        </div>
    </div>
    <div class="input-box">
        <input type="text" class="input-field" placeholder="Email" name="email">
        <i class="bx bx-envelope"></i>
    </div>
    <div class="input-box">
        <input type="password" class="input-field" placeholder="Password" id="password" name="password">
        <i class="bx bx-lock-alt"></i>
    </div>
    <div class="input-box">
        <input type="submit" class="submit" value="Register" name="register">
    </div>
    <br>
    <p>Sudah memiliki akun ? <a href="login.php"> Klik disini</a></p>
    <p>Anda seorang admin ? <a href="adminlogin.php"> Klik disini</a></p>
</div>
  </div>
</div>
</div>   
</body>
</body>
</html>
</form>
<?php
if (isset($_POST["register"])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Periksa apakah semua field sudah diisi
    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password)) {
        // Lakukan validasi data lainnya di sini jika diperlukan

        // Lakukan koneksi ke database
        include "koneksi.php";

        // Lakukan query untuk memasukkan data ke dalam database
        $query = "INSERT INTO tb_users (firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";
        
        // Jalankan query
        if ($koneksi->query($query) === TRUE) {
            echo '<script>alert("Register Berhasil"); window.location = "login.php";</script>';
        } else {
            echo "Error: " . $query . "<br>" . $koneksi->error;
        }

        // Tutup koneksi
        $koneksi->close();
    } else {
        echo '<script>alert("Mohon lengkapi semua field.");</script>';
    }
}
?>


</html>