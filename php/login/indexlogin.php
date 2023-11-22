<?php
include '../../koneksi.php';

if (isset($_POST["login"])) {
	$username = $_POST["txt_username"];
	$password = $_POST["txt_password"];
	// $pass = md5($password);

	$username = mysqli_real_escape_string($conn, $username);
	$password = mysqli_real_escape_string($conn, $password);

	if (!empty(trim($username)) && !empty(trim($password))) {

		//select data sesuai database
		$query = "SELECT * FROM tb_guru WHERE username='$username' AND password='$password'";
		$result = mysqli_query($conn, $query);
		$num = mysqli_num_rows($result);

		$row = mysqli_fetch_array($result);
		$usernameVar = $row['username'];
		$passwordVar = $row['password'];
		$id_kelasVar = $row['id_kelas'];	
	}

	if ($username == "admin" && $password == "admin") {
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		header("location:../../index.php");
		exit();
	}else if ($usernameVar == $username && $passwordVar == $password && $id_kelasVar == 7) {
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		header("location:../kelas_1/indexdasboard.php");
		exit();
	} else if ($usernameVar == $username && $passwordVar == $password && $id_kelasVar == 2) {
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		header("location:../kelas_2/indexdasboard.php");
		exit();
	} else if ($usernameVar == $username && $passwordVar == $pass) {
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		header("location:../../indexguru.php");
		exit();
	}
	else if ($usernameVar != $username && $passwordVar != $pass) {
	echo '<script language = "javascript">
		alert ("Username atau Password salah"); document.location="indexlogin.php"; </script>';
}
} elseif(isset($_POST["register"])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	$pass = md5($password);
	$re_password = $_POST['confirm-pass'];

	$username = mysqli_real_escape_string($conn, $username);
	$password = mysqli_real_escape_string($conn, $password);
	// $re_password = mysqli_real_escape_string ($conn, $pass);

	if (!empty(trim($username)) && !empty(trim($password)) && !empty(trim($re_password))) {
		if($password == $re_password){
			$query = "UPDATE tb_guru SET password='$pass' WHERE username='$username'";
			$result = mysqli_query($conn,$query);
			echo '<script language = "javascript">
			alert ("Password Berhasil Diubah"); document.location="indexlogin.php"; </script>';
		} if($password != $re_password){
			echo '<script language = "javascript">
			alert ("Password Tidak Sama"); document.location="indexlogin.php"; </script>';
		}
	}
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../../asset/css/login1.css">
	<title>Responsive Login And Register Form</title>
	<link href="../../img/logo_putih.png" rel="shortcut icon">
</head>

<body>
	<div class="container">
		<form action="indexlogin.php" class="login active" method="POST">
			<h2 class="title">Login</h2>
			<div class="form-group">
				<label for="email">Username</label>
				<div class="input-group">
					<input type="text" name="txt_username" placeholder="Masukkan username" required
						oninvalid="this.setCustomValidity('Username tidak boleh kosong')"
						oninput="setCustomValidity('')">
					<i class='bx bx-user'></i>
				</div>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<div class="input-group">
					<input type="password" pattern=".{5,}" name="txt_password" placeholder="Masukkan password" required
						oninvalid="this.setCustomValidity('Password tidak boleh kosong')"
						oninput="setCustomValidity('')">
					<i class='bx bx-lock-alt'></i>
				</div>
				<span class="help-text">Minimal 5 karakter</span>
			</div>
			<!-- <button type="submit" class="btn-submit" name="login" value="Login">Login</button> -->
			<input type="submit" class="btn-submit" name="login" value="Login">
			<a href="#" onclick="switchForm('register', event)">Lupa password?</a>
		</form>

		<form action="indexlogin.php" class="register" method="POST">
			<h2 class="title">Lupa Password</h2>
			<div class="form-group">
				<label for="username">Username</label>
				<div class="input-group">
					<input type="username" name="username" placeholder="Username">
					<i class='bx bx-envelope'></i>
				</div>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<div class="input-group">
					<input type="password" pattern=".{5,}" name="password" placeholder="Your password">
					<i class='bx bx-lock-alt'></i>
				</div>
				<span class="help-text">At least 5 characters</span>
			</div>
			<div class="form-group">
				<label for="confirm-pass">Confirm password</label>
				<div class="input-group">
					<input type="password" name="confirm-pass" placeholder="Enter password again">
					<i class='bx bx-lock-alt'></i>
				</div>
				<span class="help-text">Confirm password must be same with password</span>
			</div>
			<!-- <button type="submit" class="btn-submit">Register</button> -->
			<input type="submit" class="btn-submit" name="register" value="Register">
			<p>I already have an account. <a href="#" onclick="switchForm('login', event)">Login</a></p>
		</form>
	</div>

	<script src="../../asset/js/scripts.js"></script>
</body>

</html>