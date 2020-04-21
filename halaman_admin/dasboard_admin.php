<?php
    // memanggil menu bar
    include ("menu_bar.php");
    // menghubungkan dengan koneksi
    include ("../koneksi.php");
    // mengaktifkan session php
    if($_SESSION['status']!="login"){
    header("location:../login.php?pesan=login_gagal03");
}
?>
    <title>Dasboard | Admin</title>
    <style type="text/css">
    	 p, h3 {
    		font-family: cursive;
    		color: black;
    	}
        h5 {
            font-family: cursive;
            color: gray;
        }
        .container {
            background-color: #F0F8FF;
            padding-bottom: 40px;

        }
    </style>
<br>

<div class="container">
    <h5>Selamat Datang di Dasboard Admin <?php echo $_SESSION['nama_user']; ?> Dengan Username : <?php echo $_SESSION['username'];?></h5><br>
        <h3>Peraturan Admin</h3>
    <ul>
        <li>Admin hanya boleh mengganti data jika di perlukan dan tidak membocorkan data ke pihak siapapun.</li>
        <li>Di mohon untuk tidak menyalahgunakan website ini dan digunakan sebagaimana mestinya</li>
        <li>Gunakan secara bijak</li>
        <li>Jika Ingin menambahkan data Perusahaan maka di isi sesuai urutan</li>
    </ul>
</div>

</footer>
</body>
</html>
