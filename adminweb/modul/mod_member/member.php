<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_member/aksi_member.php";
switch($_GET[act]){
  // Tampil Member
  default:
    echo "<h2>Member</h2>
          <table>
          <tr><th>ID Member</th>
		  <th>Nama Lengkap </th>		 
		  <th>Alamat</th>
		  <th>Email </th>
		  <th>No Rekening</th>
		  <th>No TELPON</th>
		  <th>Aksi</th></tr>";

    $tampil = mysql_query("SELECT * FROM kustomer ORDER BY id_kustomer DESC");
    
    while($r=mysql_fetch_array($tampil)){
      $tanggal=tgl_indo($r[tgl_masuk]);
      $harga=format_rupiah($r[harga]);
      echo "<tr><td align=center>$r[id_kustomer]</td> 
                <td align=center>$r[nama_lengkap]</td>                
                <td align=center>$r[alamat]</td>
                <td align=center>$r[email]</td>
                <td align=center>$r[rekening]</td>
				<td align=center>$r[telpon]</td>							
                <td> <a href=$aksi?module=member&act=hapus&id=$r[id_kustomer]'><img src='images/icn_trash.png' title='Hapus'></a>
				</td>
		        </tr>";
      $no++;
    }
    echo "</table>";
	break;
  
  case "editmember":
    $edit = mysql_query("SELECT * FROM kustomer WHERE id_kustomer='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Member</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=member&act=update>
          <input type=hidden name=id value=$r[id_produk]>
          <table>
		  <tr><td width=100>Nama Lengkap</td> <td> : <input type=text name='nama_lengkap' size=60 value='$r[nama_lengkap]'></td></tr>  
		  <tr><td>Alamat</td>   <td> <textarea name='alamat' style='width: 600px; height: 350px;'>$r[alamat]</textarea></td></tr>
		  <tr><td width=70>Email</td> <td> : <input type=text name='email' size=60 value='$r[email]'></td></tr>
		  <tr><td width=70>No Rekening</td>     <td> : <input type=text name='rekening' value=$r[rekening] size=2></td></tr>
		  <tr><td width=70>No Telepon</td>     <td> : <input type=text name='telpon' value=$r[telpon] size=2></td></tr>
		  <tr><td width=70>Password</td> <td> : <input type=text name='password' size=60 value='$r[password]'></td></tr>
		  <tr><td valign=top>Kota Tujuan</td>
		  <td> <select name='kota'>
          <option value=0 selected>- Pilih Kota -</option>";
        $tampil=mysql_query("SELECT * FROM kota ORDER BY nama_kota");
        while($r=mysql_fetch_array($tampil)){
         echo "<option value=$r[id_kota]>$r[nama_kota]</option>";
      }
		 
    echo "</select> <br /><br />*)  Apabila tidak terdapat nama kota tujuan Anda, pilih <b>Lainnya</b></td></tr> 
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}
}
?>
