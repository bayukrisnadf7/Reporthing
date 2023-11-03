<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: php/login/indexlogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GACOR KANG</title>
    <!-- Bootstrap -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <script src="asset/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
    <title>Reporthing</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" /> -->
    <!-- <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="asset/css/style.css" />
</head>

<body>
    <!-- ======== Main wrapper for dashboard =========== -->

    <div class="wrapper">
        <!-- =========== Sidebar for admin dashboard =========== -->

        <aside id="sidebar">
            <!-- ======== Content For Sidebar ========-->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#"><img src="img/logo_biru_muda2.png" alt="homepage" class="dark-logo"
                            style="width: 10%; margin-right: 2px; margin-bottom: 3px;" /> Reporthing</a>
                </div>
                <ul class="sidebar-nav">
                    <ul class="sidebar-nav">
                        <li class="sidebar-item">
                            <a href="indexguru.html" class="sidebar-link active">
                                <i class="fa-solid fa-gauge pe-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="php/nilai_sumatif/indexsumatif.php" class="sidebar-link">
                                <i class="fa-solid fa-chalkboard pe-2"></i>
                                Nilai Sumatif
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="php/nilai_sikap/indexsikap.php" class="sidebar-link">
                                <i class="fa-solid fa-book pe-2"></i>
                                Nilai Sikap
                            </a>
                        </li>
                    </ul>

                </ul>
                <!-- ======= Navigation links for sidebar ======== -->
                <ul class="sidebar-nav"></ul>
            </div>
        </aside>
        <!-- ========= Main section of dashboard ======= -->
        <div class="main">
            <!-- ========= Main navbar section of dashboard ======= -->
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="img/profile2.png" class="avatar img-fluid rounded-circle" alt="" />
                                <i class="fas fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#changePasswordModal">Ganti Password</a>
                                <a href="logout.php" class="dropdown-item"
                                    onClick="return confirm('Anda yakin ingin logout?')">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Modal for Change Password -->
            <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk mengganti password -->
                            <form action="changepassword.php" method="post">
                                <div class="mb-3">
                                    <label for="currentPassword" class="form-label">Current Password</label>
                                    <input type="password" class="form-control" id="currentPassword"
                                        name="currentPassword" required>
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="newPassword" name="newPassword"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" id="confirmPassword"
                                        name="confirmPassword" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal untuk Profile -->
            <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk mengedit profil -->
                            <form action="editprofile.php" method="post">
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">Guru</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========= Main content section of dashboard ======= -->
            <main class="content px-3 py-2">
                <div class="content-fluid">
                    <div class="mb-3">
                        <h4>Dashboard Guru</h4>
                    </div>
                    <div class="row">
                        <style>
                            .custom-card {
                                position: relative;
                                overflow: hidden;
                                border: none;
                                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                                width: 250px;
                                /* Atur lebar card sesuai keinginan Anda */
                                height: 80px;
                                /* Atur tinggi card sesuai keinginan Anda */
                                text-indent: 5px;
                                line-height: 20px;
                            }

                            .custom-bg-danger,
                            .custom-bg-primary,
                            .custom-bg-warning,
                            .custom-bg-success {
                                position: absolute;
                                top: 0;
                                left: 0;
                                bottom: 0;
                                width: 3%;
                            }

                            .custom-bg-danger {
                                background-color: #dc3545;
                            }

                            .custom-bg-primary {
                                background-color: #0d6efd;
                            }

                            .custom-bg-warning {
                                background-color: #ffc107;
                            }

                            .custom-bg-success {
                                background-color: #198754;
                            }

                            .card-title {
                                font-size: 20px;
                            }
                        </style>


                        <div class="col-12 col-md-3 d-flex">
                            <div class="card flex-fill border-0 custom-card">
                                <div class="card-body position-relative">
                                    <i class="fas fa-user fa-3x"
                                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); color: #D0D4CA"></i>
                                    <p class="card-title">10</p>
                                    <h6 class="card-text" style="color: #0d6efd">Pengguna Guru</h6>
                                </div>
                                <div class="custom-bg-primary"></div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3 d-flex">
                            <div class="card flex-fill border-0 custom-card">
                                <div class="card-body">
                                    <i class="fa-solid fa-user-group fa-3x"
                                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); color: #D0D4CA"></i>
                                    <p class="card-title">10</p>
                                    <h6 class="card-text" style="color: #198754">Pengguna Siswa</h6>
                                </div>
                                <div class="custom-bg-success"></div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3 d-flex">
                            <div class="card flex-fill border-0 custom-card">
                                <div class="card-body">
                                    <i class="fa-solid fa-user-tie fa-3x"
                                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); color: #D0D4CA"></i>
                                    <p class="card-title">10</p>
                                    <h6 class="card-text" style="color: #ffc107">Jumlah Guru</h6>
                                </div>
                                <div class="custom-bg-warning"></div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3 d-flex">
                            <div class="card flex-fill border-0 custom-card">
                                <div class="card-body">
                                    <i class="fa-solid fa-user-graduate fa-3x"
                                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); color: #D0D4CA"></i>
                                    <p class="card-title">10</p>
                                    <h6 class="card-text" style="color: #dc3545">Jumlah Siswa</h6>
                                </div>
                                <div class="custom-bg-danger"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Table Element -->
                    <!-- <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-tittle">Basic Table</h5>
                            <h6 class="card-subtitle text-muted">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius
                                minima ullam eum in adipisci placeat magnam reprehenderit
                                odio, expedita incidunt tempora ab modi dolorum magni deserunt
                                ducimus soluta nisi? Aliquid!
                            </h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> -->
                </div>
            </main>

            <!-- ========= light and dark mode toggle button ======= -->

            <!-- <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a> -->

            <!-- ========= footer section of dashboard ======= -->

            <!-- <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>Reporthing</strong>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="asset/js/script.js"></script>
</body>

</html>