<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";
include "../config/fungsi_rupiah.php";


// Bagian Home
if ($_GET[module]=='home'){
  if ($_SESSION['leveluser']=='admin'){
  echo "<header><br><h3><SCRIPT language=JavaScript>var d = new Date();
var h = d.getHours();
if (h < 11) { document.write('Selamat pagi,'); }
else { if (h < 15) { document.write('Selamat siang,'); }
else { if (h < 19) { document.write('Selamat sore,'); }
else { if (h <= 23) { document.write('Selamat malam,'); }
}}}</SCRIPT> <b>$_SESSION[namalengkap]</b>... Selamat Datang di Halaman Administrator.</h3></header>
  <div class='module_content'>
          <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda <br/>
		  atau pilih ikon-ikon pada Control Panel di bawah
		  ini:</b></p> <p>&nbsp;</p>

 		<table align=center>
		<th colspan=5><center><class style=\"color:#464646;font-size:15px;\">&nbsp;</center><br/></th>
		
		<tr>
		  <td width=120 align=center><a href=media.php?module=produk><img src=images/produk.png border=none></a></td>
		  <td width=120 align=center><a href=media.php?module=kategori><img src=images/kategori.png border=none></a></td>
		  <td width=120 align=center><a href=media.php?module=order><img src=images/lihatorder.png border=none></a></td>		  
		  <td width=120 align=center><a href=media.php?module=carabeli><img src=images/carabeli.png border=none></a></td>
    </tr>
		<tr>
		  <th width=120 align=center><center><b>Tambahkan Produk</b></th>
		  <th width=120 align=center><center><b>Kategori Produk</b></center></th>
		  <th width=120 align=center><center><b>Lihat Order</b></th>		  
		  <th width=120 align=center><center><b>Cara Pembelian</b></th>
		</tr>
		
		
		<tr height=20></tr>
		
		<tr>
		  
		  <td width=120 align=center><a href=media.php?module=ongkoskirim><img src=images/ongkoskirim.png border=none></a></td>		  
		  <td width=120 align=center><a href=media.php?module=profil><img src=images/toko.png border=none></a></td>
		  <td width=120 align=center><a href=media.php?module=hubungi><img src=images/hubungi.png border=none></a></td>
		  <td width=120 align=center><a href=media.php?module=password><img src=images/user.png border=none></a></td>
    </tr>
		<tr>
		  
		  <th width=120 align=center><center><b>Ongkos Kirim</b></th>		  
		  <th width=120 align=center><center><b>Profile</b></th>
		  <th width=120 align=center><center><b>Pesan Masuk</b></th>
		  <th width=120 align=center><center><b>Manajemen Admin</b></th>
		</tr>
		
	</table>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>

	<p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
  echo " </div>";
  
  }
}
// Bagian Modul
elseif ($_GET[module]=='modul'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_modul/modul.php";
  }
}
elseif ($_GET[module]=='laporanpemesanan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_laporanpemesanan/laporan.php";
  }
}

// Bagian Kategori
elseif ($_GET[module]=='kategori'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kategori/kategori.php";
  }
}

// Bagian Produk
elseif ($_GET[module]=='produk'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_produk/produk.php";
  }
}


// Bagian Order
elseif ($_GET[module]=='order'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_order/order.php";
  }
}

// Bagian Profil
elseif ($_GET[module]=='profil'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_profil/profil.php";
  }
}

// Bagian Order
elseif ($_GET[module]=='hubungi'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_hubungi/hubungi.php";
  }
}

// Bagian Cara Pembelian
elseif ($_GET[module]=='carabeli'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_carabeli/carabeli.php";
  }
}

// Bagian Banner
elseif ($_GET[module]=='rekening'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_rekening/rekening.php";
  }
}

// Bagian Kota/Ongkos Kirim
elseif ($_GET[module]=='ongkoskirim'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_ongkoskirim/ongkoskirim.php";
  }
}


// Bagian Laporan
elseif ($_GET[module]=='laporan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_laporan/laporan.php";
  }
}

// Bagian Edit Welcome
elseif ($_GET[module]=='welcome'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_welcome/welcome.php";
  }
}

// Bagian Member
elseif ($_GET[module]=='member'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_member/member.php";
  }
}
// Bagian Ganti Password
elseif ($_GET[module]=='password'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_password/password.php";
  }
}

// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
