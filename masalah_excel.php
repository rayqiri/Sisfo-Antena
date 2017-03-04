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
<title> Laporan Hotel</title>
 </head>
 <?php
error_reporting(0);
header("Pragma: public");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream" );
header("Content-Type: application/download" );;
header("Content-Transfer-Encoding: binary");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Laporan Masalah-".date("d-m-Y").".xls");
header("Pragma: no-cache");
header("Expires: 0");
 include "koneksi.php";
 include "fungsi/fungsi.php";
  include "fungsi/fungsi_indotgl.php";

$q=mysql_query("select * from masalah,klien where masalah.id_klien=klien.id_klien");
?>
<table class="table">
				                    <thead>
				                        <tr>
				                            <th>No</th>
				                            <th>Nama Klien</th>
				                            <th>Tanggal</th>
											<th>Permasalahan</th>
											
				                            <th>Keterangan</th>				                                                                     
				                        </tr>
				                    </thead>
				                    <tbody>
                                    <?php 
									$no=0;
									while($r=mysql_fetch_array($q)){ $no++;
										if($r['keterangan']=="Belum Terselesaikan"){
											$a="enabled";
										}else{
											$a="disabled";
										}
										?>

				                        <tr>
				                            <td><?php echo $no;?></td>
				                            <td><?php echo $r["nama"];?></td>
				                            <td><?php echo tgl_indo(date($r["tanggal"]));?></td>
											 <td><?php echo $r["permasalahan"];?></td>
				                           
                                            <td><?php echo $r["keterangan"];?></td>
				                        </tr>
                                    <?php } ?>
				                       
				                    </tbody>
				                </table>
                                  