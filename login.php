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
    <body style="background-color:#111111">
    <?php include "koneksi.php";?>
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
        
        <!------------------- login form -------------------------->
<form method="post">
        <div class="login-container" id="login">
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Username or Email" name="email">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="Password" name="password">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
              <input type="submit" class="submit" value="Sign In" name="signin">
            </div>
        </form>
       
       <?php 
session_start(); // Mulai sesi

include "koneksi.php"; // Sertakan file koneksi

if(isset($_POST["signin"])){ // Periksa apakah tombol sign in telah ditekan
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Periksa kecocokan email dan password dalam database
    $query = $koneksi->query("SELECT * FROM tb_users WHERE email='$email' AND password='$password'");
    $result = mysqli_num_rows($query);

    if($result == 1){ // Jika ditemukan data yang cocok
        $data = $query->fetch_assoc();

        // Simpan data pengguna ke dalam sesi
        $_SESSION["firstName"] = $data['firstName'];

        // Arahkan pengguna ke home.php
        header("Location: home.php");
        exit(); // Penting untuk menghentikan eksekusi skrip
    }
    else{
        echo "<script>alert('Login gagal');window.location='login.php'</script>";   
    }
}
?>


</body>
</body>
</html>
