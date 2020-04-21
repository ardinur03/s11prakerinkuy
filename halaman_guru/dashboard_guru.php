<?php 
  // memanggil menu bar
  include ("menu_bar_guru.php");
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['status'] ==""){
    header("location:../login.php?pesan=login_gagal01");
  }
 ?>
<!DOCTYPE html>
<html>
<head>
     <title>Dasboard | Guru</title>
    <style type="text/css">
    	h3 {
    		font-family: cursive;
    		color: black;
    	}
      h2 {
          font-family: cursive;
          color: gray;
      }
      .container {
      background-color: #F0F8FF;
      padding-bottom: 40px;
      }
    </style>
</head>
<body>
<div class="col">
  <div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        <li class="breadcrumb-item"><a href="#"></a></li>
      </ol>
      </nav>
  </div>
  <div class="container">
    <h2>Selamat Datang di Dasboard Guru </h2><br>
      <h4>Website ini di gunakan oleh Guru Pembimbing dan Guru Wali kelas</h4>
      <h5>Berikut Fungsi Guru : </h5>
    <ul>
      <li>Website ini di gunakan oleh Guru Pembimbing dan Guru Wali kelas.</li>
      <li>Guru bisa menambah,mengedit,menghapus Data Siswa.</li>
      <li>Guru bisa menambah,mengedit,menghapus Data Perusahaan.</li>
      <li>Guru bisa menambah,mengedit,menghapus Data Guru Pembimbing.</li>
    </ul>
  </div>
</div>
</body>
</html>
