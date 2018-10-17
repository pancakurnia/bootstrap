<?php 
  error_reporting(0);
  session_start();	
  include "config/koneksi.php";
	include "config/fungsi_indotgl.php";
	include "config/fungsi_combobox.php";
	include "config/library.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_rupiah.php";
?>

<html xmlns="">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Flazz Komputer</title>
	
	<link rel="shortcut icon" type="image/x-icon" href="template/images/logoflazz.png" />
	<link rel="stylesheet" type="text/css" href="template/css/style.css"  media="screen" /> 
	<link rel="stylesheet" type="text/css" href="template/css/common.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="template/css/button.css" media="screen" />
	
	<script src="template/js/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="template/js/slides.min.jquery.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(function(){
			$('.slides').slides({
				preload: true,
				generatePagination: true,
				play:3000
			});
		});
	</script>
</head>
	<body>
<!--Wrapper-->
<div id="wrapper"> 
      <!--Page-->
      <div class="page shadow"> 
	  
    <!--Header-->
    <div id="header">
          <div class="primary-section">
       
        <div class="header-aside"> 
          <ul>
		<?php
		if ($_SESSION[email]=="") {
			echo "
			<li class='border'><a href='media.php?module=login' class='log'> login </a></li>
            <li><a href='media.php?module=register' class='user'>register</a></li>
			";
		}
		else {
			echo "<li class='carts'><a href='media.php?module=keranjangbelanja' class='cart'>Keranjang Belanja</a></li>";

			
		}
		?>
			<li class='border'><a href='logout.php' class='log'> Logout </a></li>
           
          </ul>
            </div>
      </div> 
		<div class="nav-section">
			<ul class="navigation">
              <li><a href="media.php?module=home"> BERANDA </a></li>
              <li><a href="media.php?module=profilkami">PROFILE </a></li>
			  <li><a href="media.php?module=semuaproduk"> PRODUK </a></li>
              <li><a href="media.php?module=carabeli">CARA PEMBELIAN</a></li>
              <li><a href="media.php?module=pemesanan"> HUBUNGI KAMI </a></li>
			  <li></li><li></li><li></li>
			  <ul class="search-box"> <form method="POST" action="media.php?module=hasilcari">
			  <li><input name="kata" type="text" placeholder="Cari Barang">
			  <a href="media.php?module=hasilcari"></a> </li></form></li>
			 </ul>
			</ul>			
        </div>
				
    <!--Content-->
    <div id="content">
          <div class="sidebar">
		  
	<?php
	if ($_SESSION[email] !="") {
	echo "
        <div class='latest-product'>
              <h2>Your Menu</h2>
              <ul class='info'>
			  <img src='template/images/profuser.jpg' />
			  <li><a href='media.php?module=profilKustomer'>My Profil</a></li>
			  <li><a href='media.php?module=profilKustomer'>Daftar Order</a></li>
			  <li><a href='media.php?module=keranjangbelanja'>Shoping Cart<img src='template/images/cart.gif' /></a></li>
			  ";
			 echo "<div style='color:#E1473D;border:1px solid #E78686;padding:10px;background:#FFE1E1;'>";
			  include "item.php";
			 echo "</div>";
	echo "
			  
			  <li><a href='logout.php'>Logout</a></li>
          </ul>
             </div>
		";
			}
	?>
			
        <div class="latest-product">
              <h2>Produk Terlaris</h2>
              <ul class="info">
      <?php
      $best=mysql_query("SELECT * FROM produk ORDER BY dibeli DESC LIMIT 3");
      while($a=mysql_fetch_array($best)){
        $harga = format_rupiah($a[harga]);
		    echo "<li><img src='foto_produk/small_$a[gambar]' height='50' width='30' />
					<div class='p-info'><a href='media.php?module=detailproduk&id=$a[id_produk]'>$a[nama_produk]</a></div>			
				</li>
			";
      }

        ?>
          </ul>
             </div>
        <div class="latest-product ">
              <h2>Kategori Produk</h2>
              <ul class="info">
			  <?php
			              $kategori=mysql_query("select nama_kategori, kategori.id_kategori, 
                                  count(produk.id_produk) as jml 
                                  from kategori left join produk 
                                  on produk.id_kategori=kategori.id_kategori 
                                  group by nama_kategori");
            $no=1;
            while($k=mysql_fetch_array($kategori)){
                echo "<li><a href=' media.php?module=detailkategori&id=$k[id_kategori]'> $k[nama_kategori] ($k[jml])</a></li>";
              $no++;
            }
            ?>
			<br> <br>
			<img src="template/images/svch.jpg" /><br><br>
			Kami Menerima Instalasi & Service Komputer,Laptop,Printer.<br> <br>
			<img src="template/images/svc.jpg" />
			<br> <br> <br>
			--------------------------------
			<img src="template/images/bca.gif" />
			<img src="template/images/mandiri.gif" />
			<img src="template/images/bni.gif" />
			<img src="template/images/bri.gif" />
          </ul>
           </div>
        <div class="latest-product f-des">

<div class="plugin">             
              <div id="fb-root"></div>
              <div class="fb-like-box" data-href="http://www.facebook.com/bennysastra19" 
			  data-width="289" data-show-faces="true" data-stream="false" data-header="true"></div>
</div>            
</div>
      </div>
          <div class="content-right" >
		  
	<?PHP include "tengah.php";?> 
	
      </div>
     </div>
    <!-- Content--> 
  </div>
      <!--Footer-->
      <div id="footer">
    <div class="footer-top">
    
    <div class="page">
          <div class="footer-bottom">
        <div class="copyright">
              <ul>
            <li> Copyright &copy; 2018 Flazz Komputer </li>
			<li> Depeloved By: <a href="https://www.bennysastra1@gmail.com" class="select"> Sofar </a></li>
            <li class="last"></li>
          </ul>
            </div>
        <div class="social-icon">
              <ul class="social-icon">
			  <li> <a href="https://www.facebook.com/sofarstmik" class="select"> </a></li>
			  </ul>
      </div>
        </div>
  </div>
      <!--Footer--> 
    </div>
<!--Wrapper-->
</body>
</html>
