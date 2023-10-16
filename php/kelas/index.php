<?php
include '../../koneksi.php';

$query = "SELECT tb_kelas.*, tb_guru.nama_guru FROM tb_kelas JOIN tb_guru ON tb_kelas.id_guru = tb_guru.id_guru;";
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
    <div class="container">
        <h1 class="mt-5">Data Kelas</h1>
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
                            <center>Id Kelas</center>
                        </th>
                        <th>
                            <center>Nama Kelas</center>
                        </th>
                        <th>
                            <center>Wali Kelas</center>
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
                                <?php echo $result['id_kelas']; ?>
                            </td>
                            <td>
                                <?php echo $result['nama_kelas']; ?>
                            </td>
                            <td>
                                <?php echo $result['nama_guru']; ?>
                            </td>
                            <!-- Button UBAH dan HAPUS-->
                            <td>
                                <center>
                                    <a href="kelola.php?ubah=<?php echo $result['id_kelas']; ?>" type="button"
                                        class="btn btn-success btn-sm">
                                        <i class="fa fa-pencil "></i>
                                    </a>
                                    <a href="proses.php?hapus=<?php echo $result['id_kelas']; ?>" type="button"
                                        class="btn btn-danger btn-sm"
                                        onClick="return confirm('Ingin menghapus data tersebut?')">
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