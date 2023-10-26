<?php
include '../../koneksi.php';

if (isset($_POST["login"])) {
	$username = $_POST["txt_username"];
	$password = $_POST["txt_password"];

	$username = mysqli_real_escape_string($conn, $username);
	$password = mysqli_real_escape_string($conn, $password);

	if (!empty(trim($username)) && !empty(trim($password))) {
      
		//select data sesuai database
		$query = "SELECT * FROM tb_user_guru WHERE username='$username' AND password='$password'";
		$result = mysqli_query($conn,$query);
		$num = mysqli_num_rows($result);
  
		$row = mysqli_fetch_array($result);
		$usernameVar = $row['username']; 
		$passwordVar = $row['password']; 
  
	  }
  
	  if($username == "admin" && $password == "admin" ){
		header("location:../../index.html");
		echo '<script language = "javascript">
    	alert ("Anda Berhasil Login"); document.location="index2.php"; </script>';
	  // if ($usernameVar== $username && $passwordVar==$password) {
	  //     // header("location:../sidebar/index.php");
	  //     echo '<script language = "javascript">
	  //     alert ("Login Berhasil"); document.location="../guru/indexguru.php"; </script>';
	  // } else if($usernameVar!= $username && $passwordVar!=$password){
	  //   echo '<scri language = "javascript">
	  //   alert ("Username atau Password salah"); document.location="index.php"; </script>';
	  // } 
	  }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../../asset/css/styles.css">
	<title>Responsive Login And Register Form</title>
</head>

<body>
	<div class="container">
		<form action="index2.php" class="login active" method="POST">
			<h2 class="title">Login</h2>
			<div class="form-group">
				<label for="email">Username</label>
				<div class="input-group">
					<input type="text" name="txt_username" placeholder="Masukkan username" required oninvalid="this.setCustomValidity('Username tidak boleh kosong')" oninput="setCustomValidity('')">
					<i class='bx bx-user'></i>
				</div>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<div class="input-group">
					<input type="password" pattern=".{5,}" name="txt_password" placeholder="Masukkan password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')">
					<i class='bx bx-lock-alt'></i>
				</div>
				<span class="help-text">Minimal 5 karakter</span>
			</div>
			<!-- <button type="submit" class="btn-submit" name="login" value="Login">Login</button> -->
			<input type="submit" class="btn-submit" name="login" value="Login">
			<a href="#" onclick="switchForm('register', event)">Lupa password?</a>
		</form>

		<form action="#" class="register">
			<h2 class="title">Lupa Password</h2>
			<div class="form-group">
				<label for="email">Email</label>
				<div class="input-group">
					<input type="email" id="email" placeholder="Email address">
					<i class='bx bx-envelope'></i>
				</div>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<div class="input-group">
					<input type="password" pattern=".{5,}" id="password" placeholder="Your password">
					<i class='bx bx-lock-alt'></i>
				</div>
				<span class="help-text">At least 5 characters</span>
			</div>
			<div class="form-group">
				<label for="confirm-pass">Confirm password</label>
				<div class="input-group">
					<input type="password" id="confirm-pass" placeholder="Enter password again">
					<i class='bx bx-lock-alt'></i>
				</div>
				<span class="help-text">Confirm password must be same with password</span>
			</div>
			<button type="submit" class="btn-submit">Register</button>
			<p>I already have an account. <a href="#" onclick="switchForm('login', event)">Login</a></p>
		</form>
	</div>

	<script src="../../asset/js/scripts.js"></script>
</body>

</html>