<style type="text/css">
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
$q=mysql_query("select * from klien order by id_klien desc");
?>

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
              <th width="9%" scope="col"><img src="img/sistem/logo2.png" width="88" height="110" /></th>
              <th width="91%" valign="middle" scope="col"><span class="judul">LAPORAN KLIEN<br />
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

<table class="table" width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="x">
				                    <thead>
				                        <tr>
				                            <th>No</th>
				                            <th>Nama Klien</th>
				                            <th>Jenis Kelamin</th>
											<th>Alamat</th>
											
				                            <th>No Telp</th>
				                            <th>Email</th>
                                            <th>Jenis Paket</th>
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
				                            <td><?php echo $r["jekel"];?></td>
											 <td><?php echo $r["alamat"];?></td>
				                           
                                            <td><?php echo $r["telp"];?></td>
                                            <td><?php echo $r["email"];?></td>
                                            <td><?php echo $r["jenis_paket"];?></td>
                                            
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
              <td align="center">(Alex Setyawan)</td>
              <td align="center">(Yani Prasetyo)</td>
            </tr>
          </table> 
                                    <br>
                                    <div align="center">Print On. <?php echo date("d M Y");?>. Generated by CV Rajalangit Network.</div>
                                    </body>
                                    </html>     
<script language="javascript">window.print() </script>
 <script language="javascript">self.history.back() </script>           