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
 <html>
 <head>
 	<title> Laporan Hotel</title>
 </head>
 <body>
 <?php
 error_reporting(0);
 include "koneksi.php";
 include "fungsi/fungsi.php";

$q=mysql_query("select * from masalah,klien where masalah.id_klien=klien.id_klien");
?>

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
              <th width="9%" scope="col"><img src="img/sistem/logo.png" width="88" height="110" /></th>
              <th width="91%" valign="middle" scope="col"><span class="judul">LAPORAN MASALAH<br />
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
                                    <br>
                                    <div align="center">Print On. <?php echo date("d M Y");?>. Generated by CV Rajalangit Network.</div>
                                    </body>
                                    </html>     
<script language="javascript">window.print() </script>
 <script language="javascript">self.history.back() </script>           