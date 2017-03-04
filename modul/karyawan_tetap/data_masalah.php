
<div class="page-content">
			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Laporan Masalah<small> Berikut adalah daftar Masalah. silahahkan cetak per periode. dan simpan didalam arsip Anda</small></h3>
				</div>
				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="master.php">Dashboard</a></li>
                
					<li class="active">Data Masalah</li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

				
			</div>
			<!-- /breadcrumbs line -->


			<!-- Callout
			<div class="callout callout-info fade in">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<h5>Intruksi</h5>
				<p>Silahkan Pilih Kriteria hotel yang Anda Inginkan</p>
			</div>
             /callout -->
			
            
            
<div class="row">
        		<div class="col-md-12">

            		<!-- Default panel --> 
		            <div class="panel panel-default">
		                <div class="panel-heading">
	                    	<h6 class="panel-title"><i class="icon-pencil3"></i> Data Masalah Klien</h6>
                    	</div>
                    	<div class="panel-body">
                        <div align="right">
                        <form method="post" action="" class="form-inline">
                        
                       <select name="tanggal" class="form-control" placeholder="Tanggal">
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                        </select>
                        <input type="submit" class="btn btn-primary" name="cari" value="Cari">
                        </form> 
                       	
                        </div>
                        
<?php
if(isset($_POST['cari'])){
	$tgl=date("Y-m-d");
	$tahun = substr($tgl,0,4);
	$bln=$_POST['tanggal'];
	$tanggal=$tahun."-".$bln;
if(isset($_GET['d'])){		
$dataPerhalaman =$_GET['d'];
}else{
$dataPerhalaman = 10;
}
if(isset($_GET['h'])){
	$nohalaman = $_GET['h'];
}else{ 
	$nohalaman = 1;
}

// perhitungan offset
$offset = ($nohalaman - 1) * $dataPerhalaman;
$q=mysql_query("select * from masalah,klien,karyawan,kecamatan where masalah.id_klien=klien.id_klien and klien.id_kecamatan=kecamatan.id_kecamatan and karyawan.id_kecamatan=kecamatan.id_kecamatan and masalah.keterangan='Tertunda' and DATE_FORMAT(masalah.tanggal,'%Y-%m')='$tanggal' LIMIT $offset, $dataPerhalaman");
?>
<div class="table-responsive">
<table class="table">
				                    <thead>
				                        <tr>
				                            <th>No</th>
				                            <th>Nama Klien</th>
				                            <th>Nama Karyawan</th>
				                            <th>Tanggal</th>
											<th>Permasalahan</th>
											
				                            <th>Keterangan</th>
				                            <th>Aksi</th>
                                            
				                        </tr>
				                    </thead>
				                    <tbody>
                                    <?php 
									$no=0;
									while($r=mysql_fetch_array($q)){ $no++;
										if($r['keterangan']=="Belum Terselesaikan"){
											$a="enabled";
											$b="enabled";
										}elseif ($r['keterangan']=="Terselesaikan"){
											$a="disabled";
											$b="disabled";
										}else{
											$a="enabled";
											$b="disabled";
										}
										?>
				                        <tr>
				                            <td><?php echo $no;?></td>
				                            <td><?php echo $r["nama"];?></td>
				                            <td><?php echo $r["nama_karyawan"];?></td>
				                            <td><?php echo tgl_indo(date($r["tanggal"]));?></td>
											 <td><?php echo $r["permasalahan"];?></td>
				                           
                                            <td><?php echo $r["keterangan"];?></td>
                                            <td><a href="?module=aksi_masalah&id=<?php echo $r['id_masalah'];?>&ket=Terselesaikan 2"<button class="btn btn-primary" <?php echo $a;?>>Masalah Selesai</button></a></td>
				                        </tr>
                                    <?php } ?>
				                       
				                    </tbody>
				                    
				                </table>
                                
                                <hr>


					<div class="text-center block">
<ul class="pagination">
<?php
	$jumData = mysql_num_rows(mysql_query("select * from masalah,klien,karyawan,kecamatan where masalah.id_klien=klien.id_klien and klien.id_kecamatan=kecamatan.id_kecamatan and karyawan.id_kecamatan=kecamatan.id_kecamatan and masalah.keterangan='Tertunda' and DATE_FORMAT(masalah.tanggal,'%Y-%m')='$tanggal'"));
// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
$jumhalaman = ceil($jumData/$dataPerhalaman);

// menampilkan link previous
if ($nohalaman > 1){
	echo "<li><a role='button' href='".$_SERVER['PHP_SELF']."?module=data_masalah&d=$dataPerhalaman&h=".($nohalaman-1)."' >&larr;</a></li>";
}


// memunculkan nomor halaman dan linknya
for($halaman = 1; $halaman <= $jumhalaman; $halaman++)
{
		 if ((($halaman >= $nohalaman - 3) && ($halaman <= $nohalaman + 3)) || ($halaman == 1) || ($halaman == $jumhalaman)) 
		 {   
			if (($showhalaman == 1) && ($halaman != 2)){  echo "...";} 
			if (($showhalaman != ($jumhalaman - 1)) && ($halaman == $jumhalaman)){  echo "...";}
			if ($halaman == $nohalaman){ 
				echo " <li class='active'><a href='#'>".$halaman."</a></li>";
			}else{ 
				echo "<li><a href='".$_SERVER['PHP_SELF']."?module=data_masalah&d=$dataPerhalaman&h=".$halaman."'>".$halaman."</a><li>";
			}
			$showhalaman = $halaman;          
		 }
}

// menampilkan link next
if ($nohalaman < $jumhalaman){ 
	echo "<li><a role='button' href='".$_SERVER['PHP_SELF']."?module=data_masalah&d=$dataPerhalaman&h=".($nohalaman+1)."' >&rarr;</a></li>";
}
?>
</ul>



</div>
</div>
<?php }else{
if(isset($_GET['d'])){		
$dataPerhalaman =$_GET['d'];
}else{
$dataPerhalaman = 10;
}
if(isset($_GET['h'])){
	$nohalaman = $_GET['h'];
}else{ 
	$nohalaman = 1;
}

// perhitungan offset
$offset = ($nohalaman - 1) * $dataPerhalaman;
$q=mysql_query("select * from masalah,klien,karyawan,kecamatan where masalah.id_klien=klien.id_klien and klien.id_kecamatan=kecamatan.id_kecamatan and karyawan.id_kecamatan=kecamatan.id_kecamatan and masalah.keterangan='Tertunda' LIMIT $offset, $dataPerhalaman");
?>
<div class="table-responsive">
<table class="table">
				                    <thead>
				                        <tr>
				                            <th>No</th>
				                            <th>Nama Klien</th>
				                            <th>Tanggal</th>
											<th>Permasalahan</th>
											
				                            <th>Keterangan</th>
				                            <th>Aksi</th>
                                            
				                        </tr>
				                    </thead>
				                    <tbody>
                                    <?php 
									$no=0;
									while($r=mysql_fetch_array($q)){ $no++;
										if($r['keterangan']=="Belum Terselesaikan"){
											$a="enabled";
											$b="enabled";
										}elseif ($r['keterangan']=="Terselesaikan"){
											$a="disabled";
											$b="disabled";
										}else{
											$a="enabled";
											$b="disabled";
										}
										?>
				                        <tr>
				                            <td><?php echo $no;?></td>
				                            <td><?php echo $r["nama"];?></td>
				                            <td><?php echo tgl_indo(date($r["tanggal"]));?></td>
											 <td><?php echo $r["permasalahan"];?></td>
				                           
                                            <td><?php echo $r["keterangan"];?></td>
                                            <td><a href="?module=aksi_masalah&id=<?php echo $r['id_masalah'];?>&ket=Terselesaikan 2"<button class="btn btn-primary" <?php echo $a;?>>Masalah Selesai</button></a></td>
				                        </tr>
                                    <?php } ?>
				                       
				                    </tbody>
				                    
				                </table>
                                
                                <hr>


					<div class="text-center block">
<ul class="pagination">
<?php
	$jumData = mysql_num_rows(mysql_query("select * from masalah,klien,karyawan,kecamatan where masalah.id_klien=klien.id_klien and klien.id_kecamatan=kecamatan.id_kecamatan and karyawan.id_kecamatan=kecamatan.id_kecamatan and klien.id_kecamatan=$_SESSION[kec]"));
// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
$jumhalaman = ceil($jumData/$dataPerhalaman);

// menampilkan link previous
if ($nohalaman > 1){
	echo "<li><a role='button' href='".$_SERVER['PHP_SELF']."?module=data_masalah&d=$dataPerhalaman&h=".($nohalaman-1)."' >&larr;</a></li>";
}


// memunculkan nomor halaman dan linknya
for($halaman = 1; $halaman <= $jumhalaman; $halaman++)
{
		 if ((($halaman >= $nohalaman - 3) && ($halaman <= $nohalaman + 3)) || ($halaman == 1) || ($halaman == $jumhalaman)) 
		 {   
			if (($showhalaman == 1) && ($halaman != 2)){  echo "...";} 
			if (($showhalaman != ($jumhalaman - 1)) && ($halaman == $jumhalaman)){  echo "...";}
			if ($halaman == $nohalaman){ 
				echo " <li class='active'><a href='#'>".$halaman."</a></li>";
			}else{ 
				echo "<li><a href='".$_SERVER['PHP_SELF']."?module=data_masalah&d=$dataPerhalaman&h=".$halaman."'>".$halaman."</a><li>";
			}
			$showhalaman = $halaman;          
		 }
}

// menampilkan link next
if ($nohalaman < $jumhalaman){ 
	echo "<li><a role='button' href='".$_SERVER['PHP_SELF']."?module=data_masalah&d=$dataPerhalaman&h=".($nohalaman+1)."' >&rarr;</a></li>";
}
?>
</ul>



</div>
</div>
<?php
}
?>
                        </div>
                        
                    </div>
                    <!-- /default panel --> 
        		</div>
               
</div>


	        