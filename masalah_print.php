
 <html>
 <head>
 <style type="text/css">
body {
	font-family:arial;
}
table {
	border-collapse:collapse;
}
.judul{
	font-size:18px;
}
.judu2{
	font-size:12px;
}
.x{
	border-collapse:collapse;
	border:thin solid #000;
}
</style>
 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/londinium-theme.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="css/icons.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
 	<title></title>
 </head>
 <body>
 <?php
 error_reporting(0);
 include "koneksi.php";
 include "fungsi/fungsi.php";
 include "fungsi/fungsi_indotgl.php";
$karyawan=isset($_GET['karyawan']) ? $_GET['karyawan'] : "";
$bln=isset($_GET['tgl']) ? $_GET['tgl'] : "";
$tgl=date("Y-m-d");
  $tahun = substr($tgl,0,4);
  $tanggal=$tahun."-".$bln;
if ($karyawan=="" && $tanggal ==""){
$q=mysql_query("select * from masalah,klien,karyawan,kecamatan where masalah.id_klien=klien.id_klien and klien.id_kecamatan=kecamatan.id_kecamatan and karyawan.id_kecamatan=kecamatan.id_kecamatan");
}elseif ($bln==""){
	$q=mysql_query("select * from masalah,klien,karyawan,kecamatan where masalah.id_klien=klien.id_klien and klien.id_kecamatan=kecamatan.id_kecamatan and karyawan.id_kecamatan=kecamatan.id_kecamatan and karyawan.id_karyawan='$karyawan'");
}elseif($karyawan==""){
  $q=mysql_query("select * from masalah,klien,karyawan,kecamatan where masalah.id_klien=klien.id_klien and klien.id_kecamatan=kecamatan.id_kecamatan and karyawan.id_kecamatan=kecamatan.id_kecamatan and DATE_FORMAT(masalah.tanggal,'%Y-%m')='$tanggal'");
}else{
   $q=mysql_query("select * from masalah,klien,karyawan,kecamatan where masalah.id_klien=klien.id_klien and klien.id_kecamatan=kecamatan.id_kecamatan and karyawan.id_kecamatan=kecamatan.id_kecamatan and DATE_FORMAT(masalah.tanggal,'%Y-%m')='$tanggal' and karyawan.id_karyawan='$karyawan'");
}
?>

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
              <th width="9%" scope="col"><img src="img/sistem/logo2.png" width="88" height="110" /></th>
              <th width="91%" valign="middle" scope="col"><span class="judul">LAPORAN HASIL KERJA<br />
             CV RAJALANGIT NETWORK</span><br />
<span class="judul2">Jl. Kudus - Purwodadi KM 08 Undaan Kudus 59372, Telp. (0291)4247684 Website. www.rajalangitnetwork.co.id</span></th>
            </tr>
            
          </table>
          <hr size="3" color="#000000" />
          <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="x">
            <tr>
              <td colspan="4" scope="col" align="center">Periode : <?php echo date("d M Y")?></td>
            </tr>
          </table>
<br />

<table class="table">
				                    <thead>
				                        <tr>
				                            <th>No</th>
				                            <th>Nama Klien</th>
                                    <th>Nama Karyawan</th>
				                            <th>Tanggal</th>
											<th>Permasalahan</th>
											
				                            <th>Keterangan</th>				                                                                     
				                        </tr>
				                    </thead>
				                    <tbody>
                                    <?php 
									$no=0;
									while($r=mysql_fetch_array($q)){ $no++;
										
										?>

				                        <tr>
				                            <td><?php echo $no;?></td>
				                            <td><?php echo $r["nama"];?></td>
                                    <td><?php echo $r["nama_karyawan"];?></td>
				                            <td><?php echo tgl_indo(date($r["tanggal"]));?></td>
											 <td><?php echo $r["permasalahan"];?></td>
				                           
                                            <td><?php echo $r["keterangan"];?></td>
				                        </tr>
                                    <?php } ?>
				                       
				                    </tbody>
				                </table>
				                <table width="50%" border="0" align="right">
            <tr>
              <td width="14%">&nbsp;</td>
              <td width="55%">&nbsp;</td>
              <td width="31%">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="center">Manajer Teknisi</td>
              <td align="center">Direktur</td>
            </tr>
            <tr>
              <td height="52">&nbsp;</td>
              <td>&nbsp;</td>
              <td id="tt">&nbsp;  </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="center">(Alex Styawan)</td>
              <td align="center">(Yani Prasetyo)</td>
            </tr>
          </table> 
                                    <br>
                                    <div align="center">Print On. <?php echo date("d M Y");?>. Generated by CV Rajalangit Network.</div>
                                    </body>
                                    </html>     
<script language="javascript">window.print() </script>
 <script language="javascript">self.history.back() </script>           