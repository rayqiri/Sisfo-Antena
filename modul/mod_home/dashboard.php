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

	  
            	if($_SESSION['hak_akses']=="admin" || $_SESSION['hak_akses']=="karyawan_tetap"){
				$sql_lokasi="select * from klien";
				}else{
				
				$sql_lokasi="select * from klien where id_kecamatan='$_SESSION[kec]'";
				}
            	$result=mysql_query($sql_lokasi);
				// ambil nama,lat dan lon dari table lokasi
            	while($data=mysql_fetch_object($result)){
            		$ada=mysql_fetch_object(mysql_query("SELECT keterangan FROM masalah WHERE id_klien='$data->id_klien' order by tanggal desc"));
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
       <?php
				}
		?>		
    
    ];
	
	
    //Parameter Google maps
    var options = {
      zoom: 12, //level zoom
	  //posisi tengah peta
      center: new google.maps.LatLng(-6.8081487247897, 110.84135647082519),
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
					url : "get_info.php",
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

<div class="page-content">
			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Dashboard<small> Selamat Datang ke dalam sistem SIG Antena CV Raja Langit Network </small></h3>
				</div>
				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?p=dashboard">Dashboard</a></li>
				</ul>


				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>


			</div>
			<div class="panel-body">
                        <div class="datatable-media">
                        	<script language="JavaScript">$d = new Date();$h=$d.getHours();if ($h < 11) { document.write('Selamat pagi '); }else { if ($h < 15) { document.write('Selamat siang '); }else { if ($h < 18) { document.write('Selamat sore '); }else { if ($h <= 23) { document.write('Selamat malam '); }}}}</script><b> <?php 
					
					echo $_SESSION['user'];?></b>, Selamat datang di halaman utama SIG Antena,
					Anda dapat mengolah segala aktifitas dalam sistem ini.. semua aktifitas yang Anda lakukan akan terekam dalam database.
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
<form action="#" class="form-horizontal" role="form">
	            <div class="panel panel-info">
	                <div class="panel-heading"><h6 class="panel-title"><i class="icon-grid"></i> Map</h6></div>
	                <div class="panel-body">

						<div id="peta"></div>
<div id="panel"   style="width: 300px; float:left;"></div> 
			      </div>
			  </div>
  </form>
        		<div class="col-md-7">

            		<!-- Default panel --> 
		            
                    <!-- /default panel --> 
        		</div>

 
				 
        		
               
               
</div>



	        <!-- Footer -->
