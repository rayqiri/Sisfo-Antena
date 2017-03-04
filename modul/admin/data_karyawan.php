
<div class="page-content">

	<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Daftar Karyawan<small>Menampilkan Seluruh Karyawan Didalam Sistem</small></h3>
				</div>
				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="master.php">Dashboard</a></li>
					<li class="active">Daftar Karyawan</li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

				
			</div>
			<!-- /breadcrumbs line -->


			<!-- Callout 
			<div class="callout callout-info fade in">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<h5>Instruksi</h5>
				<p>Klik Salah satu hotel untuk melihat detail hotel, daftar kamar dan lokasinya.</p>
			</div>
            <!-- /callout -->


	        <!-- Page tabs -->
            <div class="tabbable page-tabs">
              <div class="tab-content">

                	<!-- First tab -->
           	    <div class="tab-pane active fade in" id="image-grid">

                		
                		<div class="bar block clearfix">
                			<form class="bar-left" method="post" action="">
                				
                				<input type="text" class="form-control" name="nama" placeholder="Cari Karyawan">
                				<button type="submit" name="cari" class="btn btn-primary btn-icon btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i>"><i class="icon-search3"></i></button>
                			</form>

           
                		</div>
                		
<?php

if(isset($_GET['d'])){		
$dataPerhalaman =$_GET['d'];
}else{
$dataPerhalaman = 8;
}
if(isset($_GET['h'])){
	$nohalaman = $_GET['h'];
}else{ 
	$nohalaman = 1;
}

// perhitungan offset
$offset = ($nohalaman - 1) * $dataPerhalaman;
if(isset($_POST['cari'])){
$q=mysql_query("SELECT * FROM karyawan WHERE nama_karyawan LIKE '%$_POST[nama]%'LIMIT $offset, $dataPerhalaman");
}else{
$q=mysql_query("SELECT * FROM karyawan LIMIT $offset, $dataPerhalaman");
}
?>

		                <!-- With titles (frame) -->
						<div class="row">
                            <?php 
								while($r=mysql_fetch_array($q)){
								?>
							<div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="img/karyawan/<?php echo $r["gambar"];?>" width="300">
											<div class="thumb-options">
												<span>
												<a href="?module=detail_karyawan&id=<?php echo $r["id_karyawan"];?>" class="btn btn-icon btn-success"><i class="icon-search"></i></a>
<a href="?module=edit_karyawan&id=<?php echo $r["id_karyawan"];?>" class="btn btn-icon btn-success"><i class="icon-pencil"></i></a>
<a href="?module=hapus_karyawan&id=<?php echo $r["id_karyawan"];?>" class="btn btn-icon btn-success"><i class="icon-remove2"></i></a>
                                                    
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<center><b><?php echo $r["nama_karyawan"];?></b></center>
								    		<?php echo $r["alamat"];?><br />
                                            <?php echo $r["telp"];?><br />
                                            Status <?php echo $r["status"];?>
                                            <br />
                                            Kode <?php echo $r["id_karyawan"];?>
								    	</div>
								    </div>
								</div>
							</div>
							<?php } ?>
						</div>
		                <!-- /with titles (frame) -->


		                <hr>

		                <!-- Pagination -->
		              
<div class="text-center block">
<ul class="pagination">
<?php
$jumData = mysql_num_rows(mysql_query("select * from karyawan"));;

// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
$jumhalaman = ceil($jumData/$dataPerhalaman);

// menampilkan link previous
if ($nohalaman > 1){
	echo "<li><a role='button' href='".$_SERVER['PHP_SELF']."?module=data_karyawan&d=$dataPerhalaman&h=".($nohalaman-1)."' >&larr;</a></li>";
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
				echo "<li><a href='".$_SERVER['PHP_SELF']."?module=data_karyawan&d=$dataPerhalaman&h=".$halaman."'>".$halaman."</a><li>";
			}
			$showhalaman = $halaman;          
		 }
}

// menampilkan link next
if ($nohalaman < $jumhalaman){ 
	echo "<li><a role='button' href='".$_SERVER['PHP_SELF']."?module=data_karyawan&d=$dataPerhalaman&h=".($nohalaman+1)."' >&rarr;</a></li>";
}
?>
</ul>
</div>
                		<!-- /pagination -->

               	  </div>
               	  <!-- /first tab -->


               	  <!-- Second tab --><!-- /second tab -->


               	  <!-- Third tab --><!-- /thirs tab -->


               	  <!-- Fourth tab --><!-- /fourth tab -->

                </div>
            </div>
            <!-- /page tabs -->


	        <!-- Footer -->
	        
	        <!-- /footer -->


		