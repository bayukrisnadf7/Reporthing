<?php 
include '../koneksi.php';

if(isset($_POST["login"])){
    $username = $_POST["txt_username"];
    $password = $_POST["txt_password"];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    if (!empty(trim($username)) && !empty(trim($password))) {
      
      //select data sesuai database
      $query = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
      $result = mysqli_query($conn,$query);
      $num = mysqli_num_rows($result);

      $row = mysqli_fetch_array($result);
      $usernameVar = $row['username']; 
      $passwordVar = $row['password']; 

    }
    if ($usernameVar== $username && $passwordVar==$password) {
        // header("location:../sidebar/index.php");
        echo '<script language = "javascript">
        alert ("Login Berhasil"); document.location="../sidebar/dasboard.php"; </script>';
    } else if($usernameVar!= $username && $passwordVar!=$password){
      echo '<script language = "javascript">
      alert ("Username atau Password salah"); document.location="index.php"; </script>';
    }

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reporthing</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="center">
      <div class="gambar">
        <label> <b>Login</b></label>
      </div>
      <div class="logo">
      <img src="../img/Group 268.png" alt="">
      </div>
      <form action="index.php" method="POST">
        <div class="txt_field">
          <!-- <div class="icon">
          <img src="../icon/user (5).png" alt="">
          </div> -->
          <input type="text" name="txt_username" required oninvalid="this.setCustomValidity('Username tidak boleh kosong')" oninput="setCustomValidity('')">
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="txt_password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')">
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass" name="change">
          <a href="ubah_pw.php">
          <span>Change Password?</span>
          </a>
        </div>
        <input type="submit" name="login" value="Login">
        <!-- <div class="signup_link">
          Not a member? <a href="#">Signup</a>
        </div> -->
      </form>
    </div>

  </body>
</html>
