<?php
  error_reporting(0);

session_start();

if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>
<html>
<head>
<title></title>


<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckeditor/style.js"></script>

<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
	<div id="menu">
      <ul>
		<li><a href='media.php?module=home'>Home</a>
		<li><a href='media.php?module=hubungi'>Pemesanan Barang</a></li>
		<li><a href='media.php?module=laporanpemesanan'> Lap.Pemesanan Barang</a></li>
		<li><a href='media.php?module=kategori'>Kategori Produk</a></li>
		<li><a href='media.php?module=produk'>Produk</a></li>
		<li><a href='media.php?module=order'>Order</a></li>
		<li><a href='media.php?module=ongkoskirim'>Ongkos Kirim</a></li>
		<li><a href='media.php?module=profil'>Profil Toko</a></li>
		<li><a href='media.php?module=carabeli'>Cara Beli</a></li>
		<li><a href='media.php?module=rekening'>Info Rekening</a></li>
		<li><a href='media.php?module=laporan'>Laporan</a></li>
		<li><a href='media.php?module=member'>Member</a></li>
		<li><a href='media.php?module=password'>Ganti Password</a></li>
		<li><a href='logout.php'>Logout</a></li>     
	 </ul>
	    <p>&nbsp;</p>
 	</div>
  <div id="content">
		<?php include "content.php"; ?>
  </div>
  
  
		<div id="footer">
			<center> Copyright &copy; 2018 Flazz Komputer. All rights reserved.</center>
		</div>
</div>


</body>
</html>
<?php
}
?>
