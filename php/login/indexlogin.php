<?php
include '../../koneksi.php';

if (isset($_POST["login"])) {
	$username = $_POST["txt_username"];
	$password = $_POST["txt_password"];
	$id_tahunajaran = $_POST["id_tahunajaran"];
	// $pass = md5($password);

	$username = mysqli_real_escape_string($conn, $username);
	$password = mysqli_real_escape_string($conn, $password);

	if ($username == "admin" && $password == "admin" && $id_tahunajaran == null) {
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		header("location:../../index.php");
		exit();
	} elseif ($username == "admin" && $password == "admin" && $id_tahunajaran == 14) {
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		header("location:indexlogin.php");
		exit();
	} elseif ($username == "admin" && $password == "admin" && $id_tahunajaran == 15) {
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		header("location:indexlogin.php");
		exit();
	}

	if (!empty(trim($username)) && !empty(trim($password))) {
		$username = $_POST["txt_username"];
		$password = $_POST["txt_password"];
		$id_tahunajaran = $_POST["id_tahunajaran"];

		//select data sesuai database
		$query = "SELECT * FROM tb_guru WHERE username='$username' AND password='$password'";
		$result = mysqli_query($conn, $query);
		$num = mysqli_num_rows($result);

		$row = mysqli_fetch_array($result);
		$usernameVar = $row['username'];
		$passwordVar = $row['password'];
		$id_kelasVar = $row['id_kelas'];

	} if ($usernameVar == $username && $passwordVar == $password && $id_kelasVar == 6 && $id_tahunajaran == 14) {
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		header("location:../kelas1_ganjil_2023/indexdasboard.php");
		exit();
	} else if ($usernameVar == $username && $passwordVar == $password && $id_kelasVar == 6 && $id_tahunajaran == 15) {
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		header("location:../kelas1_genap_2023/indexdasboard.php");
		exit();
	} else if ($usernameVar == $username && $passwordVar == $password && $id_kelasVar == 7 && $id_tahunajaran == 14) {
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		header("location:../kelas2_ganjil_2023/indexdasboard.php");
		exit();
	} else if ($usernameVar == $username && $passwordVar == $password && $id_kelasVar == 7 && $id_tahunajaran == 15) {
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		header("location:../kelas2_genap_2023/indexdasboard.php");
		exit();
	} else if ($usernameVar != $username && $passwordVar != $pass) {
		echo '<script language = "javascript">
		alert ("Username atau Password salah"); document.location="indexlogin.php"; </script>';
	}
} elseif (isset($_POST["register"])) {

	$username = $_POST['username'];
	$password = $_POST['password'];
	$re_password = $_POST['confirm-pass'];

	$username = mysqli_real_escape_string($conn, $username);
	$password = mysqli_real_escape_string($conn, $password);
	// $re_password = mysqli_real_escape_string ($conn, $pass);

	if (!empty(trim($username)) && !empty(trim($password)) && !empty(trim($re_password))) {
		if ($password == $re_password) {
			$query = "UPDATE tb_guru SET password='$password' WHERE username='$username'";
			$result = mysqli_query($conn, $query);
			echo '<script language = "javascript">
			alert ("Password Berhasil Diubah"); document.location="indexlogin.php"; </script>';
		}
		if ($password != $re_password) {
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

			<div class="form-group">
				<label for="tahun_ajaran" class="col-sm-2 col-form-label">
					Tahun Ajaran
				</label>
				<div class="col-sm-10">
					<select name="tahun_ajaran" class="form-select" id="tahun_ajaran" onchange="displayData()">
						<option value="">-- Pilih Tahun Ajaran --</option>
						<?php
						$query = "SELECT * FROM tb_tahunajaran";
						$sql = mysqli_query($conn, $query);
						while ($data = mysqli_fetch_assoc($sql)) {
							echo '<option value="' . $data['tahun_ajaran'] . '" data-info="' . $data['id_tahunajaran'] . '">' . $data['tahun_ajaran'] . " - " . $data['semester'] . '</option>';
						}
						?>
					</select>
				</div>
			</div>
			<div style="display:none;" class="mb-3 row">
				<label for="id_tahunajaran" class="col-sm-2 col-form-label">
					NIP
				</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="id_tahunajaran" id="id_tahunajaran" readonly>
				</div>
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
			<input type="submit" class="btn-submit" name="register" value="Submit">
			<p>Back to login ? <a href="#" onclick="switchForm('login', event)">Login</a></p>
		</form>
	</div>

	<script src="../../asset/js/scripts.js"></script>

	<script>
		function displayData() {
			var selected_nip = document.getElementById("tahun_ajaran");
			var id_tahunajaran = selected_nip.options[selected_nip.selectedIndex].getAttribute('data-info');
			document.getElementById("id_tahunajaran").value = id_tahunajaran;		}
	</script>




</body>

</html>