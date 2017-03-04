 <?php
error_reporting(0);
header("Pragma: public");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream" );
header("Content-Type: application/download" );;
header("Content-Transfer-Encoding: binary");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Laporan Klien-".date("d-m-Y").".xls");
header("Pragma: no-cache");
header("Expires: 0");
 include "koneksi.php";
 include "fungsi/fungsi.php";


// perhitungan offset
$q=mysql_query("select * from klien order by id_klien desc");
?>
<table class="table">
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
									while($r=mysql_fetch_array($q)){ $no++;?>
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
                                  