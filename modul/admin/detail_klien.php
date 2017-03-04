<?php
$id=$_GET['id'];
$q=mysql_query("select * from klien where id_klien='$id'");
$r=mysql_fetch_array($q);
?>
<div class="page-content">

	<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Detail Klien<small>Informasi Lengkap tentang Klien</small></h3>
				</div>
				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?p=beranda">Beranda</a></li>
					<li class="active">Detail Klien</li>
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
           /callout -->
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-3">
<div class="panel panel-default">
<div class="panel-heading"><h6 class="panel-title"><i class="icon-bell"></i> Preview Klien</h6></div>
<div class="panel-body">
<img src="img/klien/<?php echo $r["gambar"];?>" width="100%"/>
</div>
</div>
</div>

<div class="col-lg-9 col-md-9 col-sm-9">
<div class="panel panel-default">
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-bell"></i> Informasi Klien</h6></div>
			                <div class="table-responsive">
				                <table width="100%" class="table table-striped">
				                    <thead>
			                        </thead>
				                    <tbody>
				                        <tr>
				                            <td width="28%" valign="top">Nama Klien</td>
				                            <td width="58%" valign="top"><strong><?php echo $r["nama"];?></strong> 
											
											</td>
				                        </tr>
				                        <tr>
				                            <td width="28%" valign="top">Kode</td>
				                            <td width="58%" valign="top"><strong><?php echo $r["id_klien"];?></strong> 
											
											</td>
				                        </tr>
				                        <tr>
				                            <td width="28%" valign="top">Paket</td>
				                            <td width="58%" valign="top"><strong><?php echo $r["jenis_paket"];?></strong> 
											</td>
				                        </tr>
				                        <tr>
				                            <td valign="top">No Telp</td>
				                            <td valign="top"><strong><?php echo $r["telp"];?></strong></td>
				                        </tr>
				                        <tr>
				                          <td valign="top">Alamat</td>
				                          <td valign="top"><strong><?php echo $r["alamat"];?></strong></td>
			                          </tr>
                                      <tr>
				                          <td valign="top">Email</td>
				                          <td valign="top"><strong>
										  <?php 
										 echo $r["email"];
										  ?></strong></td>
			                          </tr>
				                        <tr>
				                          <td valign="top">Ip Address</td>
				                          <td valign="top"><strong><?php echo $r["ip_address"];?></strong></td>
			                          </tr>
			                          <tr>
				                          <td valign="top">mac Address</td>
				                          <td valign="top"><strong><?php echo $r["mac_address"];?></strong></td>
			                          </tr>
				                       
                                        <tr>
				                            <td valign="top">Action</td>
				                            <td valign="top">
                                            <a onclick="history.go(-1)" class="btn btn-default btn-xs">Kembali</a>
                                            </td>
				                        </tr>
                                        
				                    </tbody>
				                </table>
			                </div>
</div>
</div>

</div>


	        <!-- Page tabs -->
            <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#lokasi" data-toggle="tab"><i class="icon-map"></i>Lokasi Klien</a></li>
                    <li ><a href="#kamar" data-toggle="tab"><i class="icon-grid"></i> Daftar Masalah</a></li>
                    
                </ul>
                <div class="tab-content">

                	<!-- First tab -->
                	<div class="tab-pane fade  " id="kamar">
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

	$q=mysql_query("select * from masalah,klien where masalah.id_klien=klien.id_klien and klien.id_klien='$id' LIMIT $offset, $dataPerhalaman");


?>
                      
                      
                      <!-- With titles (frame) -->
						<div class="row">
                         <?php 
						 if(mysql_num_rows($q)==0){
							echo "<div class='col-lg-12 col-md-12 col-sm-12' align='center'>Tidak ada data Masalah</div>";
						}else{
								
						
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
									while($r=mysql_fetch_array($q)){ $no++;?>
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
						  
<?php 
						}?>
						</div>
		                <!-- /with titles (frame) -->


		                <hr>


					<div class="text-center block">
<ul class="pagination">
<?php
	$jumData = mysql_num_rows(mysql_query("select * from masalah where id_klien='$id'"));
// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
$jumhalaman = ceil($jumData/$dataPerhalaman);

// menampilkan link previous
if ($nohalaman > 1){
	echo "<li><a role='button' href='".$_SERVER['PHP_SELF']."?module=detail_klien&d=$dataPerhalaman&h=".($nohalaman-1)."' >&larr;</a></li>";
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
				echo "<li><a href='".$_SERVER['PHP_SELF']."?module=detail_klien&d=$dataPerhalaman&h=".$halaman."'>".$halaman."</a><li>";
			}
			$showhalaman = $halaman;          
		 }
}

// menampilkan link next
if ($nohalaman < $jumhalaman){ 
	echo "<li><a role='button' href='".$_SERVER['PHP_SELF']."?module=detail_klien&d=$dataPerhalaman&h=".($nohalaman+1)."' >&rarr;</a></li>";
}
?>
</ul>



</div>

                	</div>
                	<!-- /first tab -->


                	<!-- Second tab -->
                	<div class="tab-pane active fade in" id="lokasi">

                	

		                <!-- Video with titles (frame) -->
						<div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">

<style type='text/css'>
  #peta {
  width: 100%;
  height: 500px;

} </style>
    
   <script type="text/javascript">
    
	(function() {
  window.onload = function() {
var map;
    var locations = [
        <?php
	  
            	$sql_lokasi="select * from klien where id_klien='$id' ";
            	$result=mysql_query($sql_lokasi);
				// ambil nama,lat dan lon dari table lokasi
            	$data=mysql_fetch_object($result);
            	$ada=mysql_fetch_object(mysql_query("SELECT * FROM masalah WHERE id_klien='$data->id_klien' order by tanggal desc"));
            	if($ada!=""){
            		if($ada->keterangan=="Belum Terselesaikan"){
            			$ikon='img/sistem/antenaBelum Terselesaikan.png';
            		}elseif($ada->keterangan=="Tertunda"){
            			$ikon='img/sistem/antenaTertunda.png';
            		}else{
            			$ikon='img/sistem/antena.png';
            		}
            	}else{
            		$ikon='img/sistem/antena.png';
            	}
            		 ?>
             ['<?php echo $data->id_klien;?>', <?php echo $data->lat;?>, <?php echo $data->lng;?>, '<?php echo $ikon;?>'],
	
    ];
	
	
    //Parameter Google maps
    var options = {
      zoom: 15, //level zoom
	  //posisi tengah peta
      center: new google.maps.LatLng(<?php echo $data->lat;?>, <?php echo $data->lng;?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
	
	 // Buat peta di 
    var map = new google.maps.Map(document.getElementById('peta'), options);
	 // Tambahkan Marker 
  
	 function visitorLocation(position) {
            var point = new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
 
            marker = new google.maps.Marker({
                position: point,
                map: map,
                title: "Posisi Anda Sekarang"
            });
        }
        navigator.geolocation.getCurrentPosition(visitorLocation);
			
	var infowindow = new google.maps.InfoWindow();

    var marker, i;
     /* kode untuk menampilkan banyak marker */
    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
		 icon: locations[i][3]
      });
     /* menambahkan event clik untuk menampikan
     	 infowindows dengan isi sesuai denga
	    marker yang di klik */
		
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
       return function() { 
				var data= locations[i][0];
				lokasi = data;
				console.log(lokasi);
				$.ajax({
					url : "get_info2.php",
					data : "loc=" + lokasi,
					success : function(data) {
						// jika data sukses diambil dari server, 
					/*	$("#datalokasi").innerHTML(data);*/
						iw=data;
						
				infowindow.setContent(iw);
				infowindow.open(map, marker);					}
				})
				lokasi=null;
				
				;


			}
      })(marker, i));
    }
  

  };
})();
 
       
 
	</script>


						<div id="peta"></div>


			  </div>

                        </div>				
						</div>
		                <!-- /video with titles (no frame) -->


                	</div>
                	<!-- /second tab -->



	        <!-- Footer -->
	    
	        <!-- /footer -->


		</div>