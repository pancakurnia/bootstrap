<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Member
if ($module=='member' AND $act=='hapus'){
    mysqli_query("DELETE FROM kustomer WHERE id_kustomer='$_GET[id]'");
	header('location:../../media.php?module='.$module);
}

// Update member
elseif ($module=='member' AND $act=='update'){
  mysql_query("UPDATE kustomer SET nama_lengkap = '$_POST[nama_lengkap]' WHERE id_kustomer = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
