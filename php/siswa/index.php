<?php
include '../../koneksi.php';


$query = "SELECT * FROM tb_siswa;";
$sql = mysqli_query($conn, $query);
$no = 0;

$id_siswa = '';
$nisn = '';
$nama_siswa = '';
$kelas = '';
$tempat_lahir = '';
$tanggal_lahir = '';
$no_telp = '';
$jenis_kelamin = '';
$alamat = '';

if (isset($_GET['ubah'])) {
  $id_siswa = $_GET['ubah'];

  $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
  $sql = mysqli_query($conn, $query);

  $result = mysqli_fetch_assoc($sql);

  $nisn = $result['nisn'];
  $nama_siswa = $result['nama_siswa'];
  $kelas = $result['id_kelas'];
  $tempat_lahir = $result['tempat_lahir'];
  $tanggal_lahir = $result['tanggal_lahir'];
  $no_telp = $result['no_telp'];
  $jenis_kelamin = $result['jenis_kelamin'];
  $alamat = $result['alamat'];

}

$sql1 = "SELECT id_kelas, nama_kelas FROM tb_kelas";
$result1 = $conn->query($sql1);

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
  <!-- ISINYA BRO-->
  <div class="container">
    <h1 class="mt-5">Data Siswa</h1>
    <!-- <figure>
        <blockquote class="blockquote">
          <p>Halaman Untuk Mengelola Data Siswa</p>
        </blockquote>
      </figure> -->
    <!-- Button Tambah Data -->
    <!-- <a href="kelola.php" type="button" class="btn btn-primary mb-4 mt-3">
        <i class="fa fa-plus"></i>
        Tambah Data
      </a> -->
    <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div> -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4 mt-3" data-bs-toggle="modal" data-bs-target="#TambahSiswa">
      Tambah Data
    </button>
    <!-- Modal -->
    <div class="modal fade modal-lg" id="TambahSiswa" data-bs-backdrop="static" data-bs-keyboard="false"
      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <!-- awal body modal -->
          <div class="modal-body">
            <form method="POST" action="proses.php" enctype="multipart/form-data">
              <input type="hidden" value="<?php echo $id_siswa ?>" name="id_siswa">
              <div class="mb-3 row">
                <label for="nisn" class="col-sm-2 col-form-label mt-4">
                  NISN
                </label>
                <div class="col-sm-10 mt-4">
                  <input required type="text" name="nisn" class="form-control" id="nisn" placeholder="Ex: 112233"
                    value="<?php echo $nisn; ?>">
                </div>
              </div>

              <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">
                  Nama Siswa
                </label>
                <div class="col-sm-10">
                  <input required type="text" name="nama_siswa" class="form-control" id="nama" placeholder="Ex: Naufal"
                    value="<?php echo $nama_siswa; ?>">
                </div>
              </div>

              <div class="mb-3 row">
                <label for="kelas" class="col-sm-2 col-form-label">
                  Kelas
                </label>
                <div class="col-sm-10">
                  <select required id="kelas" name="id_kelas" class="form-select">
                    <?php
                    if ($result1->num_rows > 0) {
                      while ($row = $result1->fetch_assoc()) {
                        $selected = ($row['id_kelas'] == $kelas) ? "selected" : "";
                        echo "<option $selected value='" . $row["id_kelas"] . "'>" . $row["nama_kelas"] . "</option>";
                      }
                    } else {
                      echo "0 hasil";
                    }

                    $conn->close();
                    ?>
                  </select>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="tempat_lahir" class="col-sm-2 col-form-label">
                  Tempat Lahir
                </label>
                <div class="col-sm-10">
                  <input required type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                    placeholder="Ex: Jember" value="<?php echo $tempat_lahir; ?>">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">
                  Tanggal Lahir
                </label>
                <div class="col-sm-10">
                  <input required type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                    value="<?php echo $tanggal_lahir; ?>">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="notelp" class="col-sm-2 col-form-label">
                  No Telp
                </label>
                <div class="col-sm-10">
                  <input required type="text" name="no_telp" class="form-control" id="notelp"
                    placeholder="Ex: 085XXXXXXXXX" value="<?php echo $no_telp; ?>">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="jkel" class="col-sm-2 col-form-label">
                  Jenis Kelamin
                </label>
                <div class="col-sm-10">
                  <select required id="jkel" name="jenis_kelamin" class="form-select">
                    <option <?php if ($jenis_kelamin == 'Laki-laki') {
                      echo "selected";
                    } ?> value="Laki-laki">Laki-laki
                    </option>
                    <option <?php if ($jenis_kelamin == 'Perempuan') {
                      echo "selected";
                    } ?> value="Perempuan">Perempuan
                    </option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">
                  Foto Siswa
                </label>
                <div class="col-sm-10">
                  <input <?php if (!isset($_GET['ubah'])) {
                    echo "require";
                  } ?> class="form-control" type="file"
                    name="foto" id="foto" accept="image/*">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">
                  Alamat Lengkap
                </label>
                <div class="col-sm-10">
                  <textarea required class="form-control" id="alamat" name="alamat"
                    rows="3"><?php echo $alamat; ?></textarea>
                </div>
              </div>

              <div class="mb-3 row mt-4">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <?php
                  if (isset($_GET['ubah'])) {
                    ?>
                    <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                      <i class="fa fa-floppy-o" aria-hidden="true"></i>
                      Simpan Perubahan
                    </button>
                    <?php
                  } else {
                    ?>
                    <button type="submit" name="aksi" value="add" class="btn btn-primary">
                      <i class="fa fa-floppy-o" aria-hidden="true"></i>
                      Tambahkan
                    </button>
                    <?php
                  }
                  ?>
                  <a href="index.php" type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="fa fa-reply" aria-hidden="true"></i>
                    Batal
                  </a>
                </div>
              </div>
            </form>
          </div>
          <!-- akhir body modal -->
        </div>
      </div>
    </div>
    <!-- Tabel -->
    <div class="table-responsive">
      <table class="table align-middle table-bordered table-hover">
        <thead class="table-light">
          <tr>
            <th>
              <center>No.</center>
            </th>
            <th>
              <center>NISN</center>
            </th>
            <th>
              <center>Nama</center>
            </th>
            <th>
              <center>Kelas</center>
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
                <?php echo $result['nisn']; ?>
              </td>
              <td>
                <?php echo $result['nama_siswa']; ?>
              </td>
              <td>
                <?php echo $result['id_kelas']; ?>
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
                <img src="../../img/<?php echo $result['foto_siswa']; ?>" style="width: 50px; height: 50px;">
              </td>
              <td>
                <?php echo $result['alamat']; ?>
              </td>
              
              <!-- Button UBAH dan HAPUS-->
              <td>
                <center>
                  <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>" type="submit" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#UbahSiswa"><i class="fa fa-pencil"></i></a>
                  <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button"
                    class="btn btn-danger btn-sm" onClick="return confirm('Ingin menghapus data tersebut?')">
                    <i class="fa fa-trash"></i>
                  </a>
                </center>
              </td>
              
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