<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<title>SIG Antena - CV Raja Langit Network</title>
<link rel="shortcut icon" href="img/sistem/icon.png">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/londinium-theme.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="css/icons.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyA39dmWzuu71WZ1W6xatHt84hRl0ZN1x7Q"></script>

<script type="text/javascript" src="js/plugins/charts/sparkline.min.js"></script>

<script type="text/javascript" src="js/plugins/forms/uniform.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/select2.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/inputmask.js"></script>
<script type="text/javascript" src="js/plugins/forms/autosize.js"></script>
<script type="text/javascript" src="js/plugins/forms/inputlimit.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/listbox.js"></script>
<script type="text/javascript" src="js/plugins/forms/multiselect.js"></script>
<script type="text/javascript" src="js/plugins/forms/validate.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/tags.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/switch.min.js"></script>

<script type="text/javascript" src="js/plugins/forms/uploader/plupload.full.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/uploader/plupload.queue.min.js"></script>

<script type="text/javascript" src="js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/wysihtml5/toolbar.js"></script>

<script type="text/javascript" src="js/plugins/interface/daterangepicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/moment.js"></script>
<script type="text/javascript" src="js/plugins/interface/jgrowl.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/interface/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/plugins/interface/timepicker.min.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/application.js"></script>

</head>

<body>

	<!-- Navbar -->
	<div class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="#"><img src="images/logoku.png" alt="Londinium"> </a>
			<a class="sidebar-toggle"><i class="icon-paragraph-justify2"></i></a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
				<span class="sr-only">Toggle navbar</span>
				<i class="icon-grid3"></i>
			</button>
			<button type="button" class="navbar-toggle offcanvas">
				<span class="sr-only">Toggle navigation</span>
				<i class="icon-paragraph-justify2"></i>
			</button>
		</div>

		
	</div>
	<!-- /navbar -->


	<!-- Page container -->
 	<div class="page-container">


		<!-- Sidebar -->
		<div class="sidebar">
			<div class="sidebar-content">
                <!-- User dropdown -->
				
				<!-- /user dropdown -->
				

				<!-- Main navigation -->
				<ul class="navigation">
            
           
            
           
                    
                    
                 
				</ul>
				<!-- /main navigation -->
				
			</div>
		</div>
		<!-- /sidebar -->


		<!-- Page content -->
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
   include "koneksi.php";
$id=$_GET['id'];	              					
$sql_lokasi="select * from klien where id_klien='$id'";				
     $result=mysql_query($sql_lokasi);
				// ambil nama,lat dan lon dari table lokasi
            	while($data=mysql_fetch_object($result)){
            		 ?>
             ['<?php echo $data->id_klien;?>', <?php echo $data->lat;?>, <?php echo $data->lng;?>, <?php echo $data->jenis_paket;?>],
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
		 icon: 'img/sistem/antena' + locations[i][3] + '.png'
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
	                <div class="panel-heading"><h6 class="panel-title"><i class="icon-grid"></i> Maps</h6></div>
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

		<!-- /page content -->
<?php
include "footer.php" ;
?>

	</div>
