<?php 
include '../koneksi.php';








?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS -->
    <link rel="stylesheet" href="style.css" />
    <!-- BoxIcon CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Reporthing</title>
  </head>
  <body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../img/Asset 6xxxhdpi.png" alt="logo">
                </span>
                <span>
                    <div class="text header-text">
                        <span class="name">Reporthing</span>
                    </div>
                </span>
            </div>
            <i class='bx bxs-chevrons-left arrow' ></i>
        </header>
        <hr>
        <div class="menu-bar">
          <div class="menu">
            <ul class="menu link">
              <!-- menu dasboard -->
              <li class="nav-link">
                <!-- <a href="#"> -->
                  <!-- membuat a href untuk menuju file yang dituju -->
                  <a href="dasboard.php">
                  <i class='bx bx-home-alt icons' ></i>
                  <span class="text nav-text">Dasboard</span>
                </a>
              </li>
              <!-- menu pegawai -->
              <li class="nav-link">
                <a href="#">
                  <i class='bx bx-user-circle icons'></i>
                  <span class="text nav-text">Pegawai</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="../php/siswa/index.php">
                  <i class='bx bx-user-pin icons' ></i>
                  <span class="text nav-text">Siswa</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="#">
                  <i class='bx bxs-devices icons'></i>
                  <span class="text nav-text">Kelas</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="#">
                  <i class='bx bx-book-alt icons'></i>
                  <span class="text nav-text">Mata Pelajaran</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="#">
                  <i class='bx bx-user icons' ></i>
                  <span class="text nav-text">User</span>
                </a>
              </li>
            </ul>
          </div>


          <div class="bottom-content">
            <li class="admin">
              <!-- <a href="adminn">
                <i class='bx bxs-user'></i>
                <span class="text nav-text">Admin</span>
              </a> -->
            </li>
            <li class="logout">
              <a href="../login/index.php" onclick="return confirm('Apakah anda yakin ingin keluar?')">
                <i class='bx bx-log-out icons' ></i>  
                <span class="text nav-text">Logout</span>
              </a>
            </li>
          </div>
        </div>

        
    </nav>
    
  </body>
</html>
