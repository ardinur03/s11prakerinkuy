 <?php 
    session_start(); 
    if($_SESSION['status']!="login"){
    header("location:../login.php?pesan=login_gagal04");
}
?>
