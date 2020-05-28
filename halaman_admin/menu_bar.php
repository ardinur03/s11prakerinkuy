<?php
include("../koneksi.php");
// mengaktifkan session php
session_start();
if ($_SESSION['status'] != "login") {
  header("location:../login.php?pesan=login_gagal03");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="icon" type="img/png" href="../img/icon-img/icon11.ico" />
  <!-- jQuery-2.2.4 js -->
  <script src="../js/jquery-2.2.4.min.js"></script>
  <!-- Popper js -->
  <script src="../js/popper.min.js"></script>
  <!-- Bootstrap js -->
  <script src="../js/bootstrap.min.js"></script>
  <!-- All Plugins js -->
  <script src="../js/plugins.js"></script>
  <!-- Active js -->
  <script src="../js/active.js"></script>
</head>

<body>
  <div>
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
      <!-- Brand -->
      <a class="navbar-brand" href="dasboard_admin.php"><img src="../img/logo-img/11bedabisa.png" width="60"></a>

      <!-- Links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-light" href="data_siswa.php">Data Siswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="data_pembimbing.php">Data Pembimbing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="data_perusahaan.php">Data Perusahaan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="data_pengguna-pendaftar.php">Pengguna Akun S11Prakerin</a>
        </li>
        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbardrop" data-toggle="dropdown">
            Profile
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Account</a>
            <a class="dropdown-item" href="../logout.php">Logout</a>
          </div>
        </li>
      </ul>
    </nav>

  </div>


</body>

</html>