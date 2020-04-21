<?php
    // mengkoneksikan ke data base
    include ("../koneksi.php");
    // mengaktifkan session php
    session_start();
    if($_SESSION['status']!="login"){
    header("location:../login.php?pesan=login_gagal01");
}
?>
<html>
<head>
    <style type="text/css">
        #body-row {
    margin-left:0;
    margin-right:0;
}
#sidebar-container {
    min-height: 100vh;
    background-color: #696969;
    padding: 0;
}
.sidebar-expanded {
    width: 230px;
}
.sidebar-collapsed {
    width: 60px;
}
#sidebar-container .list-group a {
    height: 50px;
    color: white;
}
#sidebar-container .list-group .sidebar-submenu a {
    height: 45px;
    padding-left: 30px;
}
.sidebar-submenu {
    font-size: 0.9rem;
}
.sidebar-separator-title {
    background-color: #333;
    height: 35px;
}
.sidebar-separator {
    background-color: #333;
    height: 25px;
}
.logo-separator {
    background-color: #333;
    height: 60px;
}
#sidebar-container .list-group .list-group-item[aria-expanded="false"] .submenu-icon::after {
  content: " \f0d7";
  font-family: FontAwesome;
  display: inline;
  text-align: right;
  padding-left: 10px;
}

#sidebar-container .list-group .list-group-item[aria-expanded="true"] .submenu-icon::after {
  content: " \f0da";
  font-family: FontAwesome;
  display: inline;
  text-align: right;
  padding-left: 10px;
}
h2 {
    font-family: cursive;
    color: gray;
}
th {
    text-align: center;
    background-color: lightblue;
}
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- jquery.dataTables.js -->
    <script src="../js/jquery.dataTables.js"></script>
    <!-- jquery js -->
    <script src="../js/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="../js/plugins.js"></script>
    <!-- Active js -->
    <script src="../js/active.js"></script>
    <!-- Favicon -->
    <link rel="icon" type="img/png" href="../img/icon-img/icon11.ico"/>
    <!-- Core Stylesheet -->
    <link href="../style.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="../css/responsive.css" rel="stylesheet">
    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- jquery.dataTables.min.css jika online -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
    <!-- jquery.dataTables.js -->
    <script type="text/javascript" src="../js/jquery.dataTables.js"></script>
    <!-- jquery.dataTables.min.css jika offline -->
    <!-- <link href="../css/jquery.dataTables.min.css" rel="stylesheet"> -->
</head>
<body>
<!-- Start Sidebar -->
<nav class="navbar navbar-expand-md navbar-dark bg-secondary">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="../img/logo-img/11bedabisa.png">
    <img src="../img/logo-img/11bedabisa.png" width="70" height="70" class="d-inline-block align-top" alt="IMG NOT FOUND">
    <span>Halaman Guru</span>
  </a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">

      <li class="nav-item dropdown d-sm-block d-md-none">
        <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
            <a class="dropdown-item" href="dashboard_guru.php">Dashboard</a>
            <a class="dropdown-item" href="data_siswa.php">Data Siswa</a>
            <a class="dropdown-item" href="data_pembimbing.php">Data Pembimbing</a>
            <a class="dropdown-item" href="data_perusahaan.php">Data Perusahaan</a>
        </div>
      </li>

    </ul>
  </div>
</nav>


<div class="row" id="body-row">
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
        <ul class="list-group">
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h6 style="font-family: cursive;" > S11PRAKERIN KUY</h6>
            </li>

            <!-- profile mulai -->
            <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-secondary list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Profile</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <div id='submenu1' class="collapse sidebar"><br><!-- collapse sidebar-submenu -->
                <a class="bg-dark text-white">
                    <center><img src="../img/logo-img/user.png" alt="IMAGE NOT FOUND"><br><?php echo $_SESSION['username'];?><br>
                <?php echo $_SESSION['nama_user'];?></center>

                </a><br><br>
                <a href="../logout.php" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fa fa-power-off fa-fw mr-2"></span>
                    <span class="menu-collapsed">LogOut</span>
                </a>
                <!-- <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Password</span>
                </a> -->
            </div>
            <!-- profile akhir -->

            <!-- profile awal -->
            <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-secondary list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-sliders fa-fw mr-3"></span>
                    <span class="menu-collapsed">MENU</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <div id='submenu2' class="collapse sidebar-submenu">
                <a href="dashboard_guru.php" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fa fa-dashboard fa-fw mr-2"></span>
                    <span class="menu-collapsed">Dashboard</span>
                </a>
                <a href="data_siswa.php" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fa fa-users fa-fw mr-2"></span>
                    <span class="menu-collapsed">Data Siswa</span>
                </a>
                <a href="data_pembimbing.php" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fa fa-users fa-fw mr-2"></span>
                    <span class="menu-collapsed">Data Pembimbing</span>
                </a>
                <a href="data_perusahaan.php" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fa fa-building fa-fw mr-2"></span>
                    <span class="menu-collapsed">Data Perusahaan</span>
                </a>


            </div>

            <!-- profile akhir -->
        </ul>
    </div> <!-- End Sidebar -->
