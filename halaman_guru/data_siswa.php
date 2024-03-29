<?php
// memanggil menu bar guru
include("menu_bar_guru.php");

if ($_SESSION['status'] != "login") {
  header("location:../login.php?pesan=login_gagal01");
}

// update data siswa
if (isset($_POST['update'])) {
  $nis           = $_POST['nis'];
  $nama_siswa    = $_POST['nama_siswa'];
  $kelas         = $_POST['kelas'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tahun_ajaran  = $_POST['tahun_ajaran'];

  // update ke data base
  $result = mysqli_query($mysqli, "UPDATE data_siswa SET nis='$nis', nama_siswa='$nama_siswa', kelas='$kelas', jenis_kelamin='$jenis_kelamin', tahun_ajaran='$tahun_ajaran' WHERE nis=$nis");
}
// menambah data siswa
if (isset($_POST['tambah'])) {
  $nis        = $_POST['nis'];
  $nama_siswa = $_POST['nama_siswa'];
  $kelas      = $_POST['kelas'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  // Insert user data into table
  $result = mysqli_query($mysqli, "INSERT INTO data_siswa(nis,nama_siswa,kelas,jenis_kelamin) VALUES ($nis, $nama_siswa, $kelas, $jenis_kelamin)");
}
// delete data siswa
if (isset($_POST['delete'])) {
  $nis    = $_POST['nis'];
  $result = mysqli_query($mysqli, "DELETE FROM data_siswa WHERE nis=$nis");
  // After delete redirect to Home, so that latest user list will be displayed.
  header("Location:data_siswa.php");
}
?>
<html>
<title>Guru | Data Siswa</title>
<style type="text/css">
  th {
    text-align: center;
    background-color: lightblue;
  }

  td {
    text-align: center;
  }

  h2 {
    font-family: cursive;
    color: gray;
  }
</style>
</head>
<?php
//mengambil data semua user dari $databaseHost
$result = mysqli_query($mysqli, "SELECT * FROM data_siswa ORDER BY nis ASC");
?>
<div class="col">
  <div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard_siswa.php">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
      </ol>
    </nav>
  </div>
  <h2>Data Siswa</h2>
  <div class="container">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">Tambah Data Siswa</button>

    <!-- modal add start -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="data_siswa.php?">
            <input type="hidden" name="id">
            <div class="modal-body">
              <!--  <div class="form-group">
                    <label>Kode Siswa</label>
                    <input type="text" class="form-control" name="kode_siswa">
                  </div> -->
              <div class="form-group">
                <label>NIS</label>
                <input type="text" class="form-control" name="nis">
              </div>
              <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" class="form-control" name="nama_siswa">
              </div>
              <div class="form-group">
                <label>Kelas</label>
                <select name="kelas" class="form-control">
                  <option>***Pilih Kelas***</option>
                  <option>11 RPL 1</option>
                  <option>11 RPL 2</option>
                  <option>11 RPL 3</option>
                  <option>11 MM 1</option>
                  <option>11 MM 2</option>
                  <option>11 MM 3</option>
                  <option>11 TKJ</option>
                  <option>11 OTKP 1</option>
                  <option>11 OTKP 2</option>
                  <option>11 OTKP 3</option>
                  <option>11 OTKP 4</option>
                  <option>11 BDP 1</option>
                  <option>11 BDP 2</option>
                  <option>11 BDP 3</option>
                  <option>11 BDP 4</option>
                  <option>11 AKL 1</option>
                  <option>11 AKL 2</option>
                  <option>11 AKL 3</option>
                  <option>11 AKL 4</option>
                  <option>11 Mlog</option>
                </select>
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label><br>
                <input type="radio" name="jenis_kelamin" value="L" required="">L<br>
                <input type="radio" name="jenis_kelamin" value="P">P
              </div>
              <div class="form-group">
                <label>Tahun Ajaran</label>
                <select name="tahun_ajaran" class="form-control">
                  <option value="">***Pilih ajaran baru***</option>
                  <option>2019-2020</option>
                  <option>2020-2021</option>
                  <option>2021-2022</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
              <button type="submit" name="tambah" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- modal add end -->

    <!-- badan tabel awal-->
    <table class="table table-striped table-bordered data">
      <form action="hasil_search.php" method="get">
        <label>Cari Pengguna : </label>&nbsp;
        <input type="text" name="nis" placeholder="NIS.....">&nbsp;
        <input type="submit" value="Cari" class="btn btn-primary">
      </form>
      <thead>
        <tr>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <th>Kelas</th>
          <th>Jenis Kelamin</th>
          <th>Tahun Ajaran</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>
      <?php
      while ($user_data = mysqli_fetch_array($result)) {
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $user_data['nis'] . "</td>";
        echo "<td>" . $user_data['nama_siswa'] . "</td>";
        echo "<td>" . $user_data['kelas'] . "</td>";
        echo "<td>" . $user_data['jenis_kelamin'] . "</td>";
        echo "<td>" . $user_data['tahun_ajaran'] . "</td>";
      ?>
        <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $user_data['nis']; ?>">Edit</button></td>
        <td class="text-center">
          <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $user_data['nis']; ?>">Hapus</button>
        </td>
        </tr>
        </tbody>
        <!-- badan tabel akhir -->

        <!-- modal edit start -->
        <div class="modal fade" id="edit<?php echo $user_data['nis']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="data_siswa.php?">
                <input type="hidden" value="<?php echo $user_data['nis']; ?>">
                <div class="modal-body">
                  <div class="form-group">
                    <label>NIS</label>
                    <input type="text" class="form-control" name="nis" value="<?php echo $user_data['nis']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" class="form-control" name="nama_siswa" value="<?php echo $user_data['nama_siswa']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas" class="form-control" required="">
                      <option value="<?= $user_data['nis']; ?>"><?= $user_data['kelas']; ?></option>
                      <option>11 RPL 1</option>
                      <option>11 RPL 2</option>
                      <option>11 RPL 3</option>
                      <option>11 MM 1</option>
                      <option>11 MM 2</option>
                      <option>11 MM 3</option>
                      <option>11 TKJ</option>
                      <option>11 OTKP 1</option>
                      <option>11 OTKP 2</option>
                      <option>11 OTKP 3</option>
                      <option>11 OTKP 4</option>
                      <option>11 BDP 1</option>
                      <option>11 BDP 2</option>
                      <option>11 BDP 3</option>
                      <option>11 BDP 4</option>
                      <option>11 AKL 1</option>
                      <option>11 AKL 2</option>
                      <option>11 AKL 3</option>
                      <option>11 AKL 4</option>
                      <option>11 Mlog</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label><br>
                    <input type="radio" name="jenis_kelamin" value="L" required="">L<br>
                    <input type="radio" name="jenis_kelamin" value="P">P
                  </div>

                  <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <select name="tahun_ajaran" class="form-control">
                      <option value="<?= $user_data['nis']; ?>"><?= $user_data['tahun_ajaran']; ?></option>
                      <option>2019-2020</option>
                      <option>2020-2021</option>
                      <option>2021-2022</option>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                  <form method="post" action="data_siswa.php">
                    <input type="hidden" name="nis_baru" value="<?php echo $user_data['nis']; ?>">
                    <button type="submit" name="update" class="btn btn-success">Save</button>
                  </form>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- modal edit akhir -->

        <!-- modal delete awal -->
        <div class="modal fade" id="delete<?php echo $user_data['nis']; ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Anda yakin ingin menghapus data Siswa <b> <?php echo $user_data['nama_siswa']; ?></b>?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>

                <form method="post" action="data_siswa.php">
                  <input type="hidden" name="nis" value="<?php echo $user_data['nis']; ?>">
                  <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                </form>
              </div>

            </div>
          </div>
          <!-- modal delete akhir -->

        <?php
      }
        ?>
    </table>
  </div>
</div>
</body>

</html>