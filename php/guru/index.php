<?php
include '../../koneksi.php';

$query = "SELECT * FROM tb_guru;";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

     <!-- Bootstrap -->
     <link href="../../asset/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../asset/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../asset/fontawesome/css/font-awesome.min.css">
    <title>Reporthing</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Reporthing</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container">
      <h1 class="mt-5">Data Guru</h1>
      <!-- <figure>
        <blockquote class="blockquote">
          <p>Halaman Untuk Mengelola Data Siswa</p>
        </blockquote>
      </figure> -->

      <!-- Button Tambah Data -->
      <a href="kelola.php" type="button" class="btn btn-primary mb-4 mt-3">
        <i class="fa fa-plus"></i>
        Tambah Data
      </a>

      <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div> -->

      <!-- Tabel -->
      <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover">
          <thead class="table-light">
            <tr>
              <th>
                <center>No.</center>
              </th>
              <th>
                <center>NIP</center>
              </th>
              <th>
                <center>Nama</center>
              </th>
              <th>
                <center>Tempat & Tgl Lahir</center>
              </th>
              <th>
                <center>No Telp</center>
              </th>
              <th>
                <center>Jenis Kelamin</center>
              </th>
              <th>
                <center>Foto</center>
              </th>
              <th>
                <center>Alamat</center>
              </th>
              <th>
                <center>Aksi</center>
              </th>
            </tr>
          </thead>

          <!-- Tabel Body -->
          <tbody>
            <?php
            while ($result = mysqli_fetch_assoc($sql)) {
              ?>
              <tr>
                <td>
                  <center>
                    <?php echo ++$no; ?>.
                  </center>
                </td>
                <td>
                  <?php echo $result['nip']; ?>
                </td>
                <td>
                  <?php echo $result['nama_guru']; ?>
                </td>
                <td>
                  <?php echo $result['tempat_lahir'] . ', ' . $result['tanggal_lahir']; ?>
                </td>
                <td>
                  <?php echo $result['no_telp']; ?>
                </td>
                <td>
                  <?php echo $result['jenis_kelamin']; ?>
                </td>
                <td>
                  <img src="../../img/<?php echo $result['foto_guru']; ?>" style="width: 50px; height: 50px;">
                </td>
                <td>
                  <?php echo $result['alamat']; ?>
                </td>

                <!-- Button UBAH dan HAPUS-->
                <td>
                  <center>
                    <a href="kelola.php?ubah=<?php echo $result['id_guru']; ?>" type="button"
                      class="btn btn-success btn-sm">
                      <i class="fa fa-pencil "></i>
                    </a>
                    <a href="proses.php?hapus=<?php echo $result['id_guru']; ?>" type="button"
                      class="btn btn-danger btn-sm" onClick="return confirm('Ingin menghapus data tersebut?')">
                      <i class="fa fa-trash"></i>
                    </a>
                </td>
                </center>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
</body>
</html>