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

<script type="text/javascript" src="js/chosen.jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/application.js"></script>
<script src="js/jquery.min.js" type="text/javascript"></script>
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

		<ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
			<li class="user dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<img src="img/admin.gif">
					<span><?php echo $_SESSION['user'];?></span>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right icons-right">
	                   
                    
                    <li><a href="?module=user"><i class="icon-tools"></i>User</a></li>
                    <li><a href="?module=panduan"><i class="icon-tools"></i>Panduan</a></li>
                    <li><a href="?module=data_login"><i class="icon-tools"></i>Log</a></li>
                    <li><a href="?module=pesan"><i class="icon-tools"></i>Kirim Pesan</a></li>
					<li><a href="logout.php"><i class="icon-exit"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- /navbar -->


	<!-- Page container -->
 	<div class="page-container">


		<!-- Sidebar -->
		<div class="sidebar">
			<div class="sidebar-content">
                <!-- User dropdown -->
				<div class="user-menu dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo $gbr;?>" alt="">
						<div class="user-info">
							<?php echo $_SESSION["user"];?> <span><?php echo $_SESSION["hak_akses"];?></span>
						</div>
					</a>
				</div>
				<!-- /user dropdown -->
				

				<!-- Main navigation -->
				<ul class="navigation">
            <li><a href="master.php"><span>Dashboard</span> <i class="icon-meter"></i></a></li>
           
            <li><a href="?module=karyawan"><span>Tambahkan Karyawan</span> <i class="icon-plus"></i></a></li>
           <li><a href="?module=data_karyawan"><span>Data Karyawan</span> <i class="icon-enter3"></i></a></li> 
            <li><a href="?module=klien"><span>Tambahkan Klien</span> <i class="icon-plus"></i></a></li>
                    <li><a href="?module=data_klien"><span>Data Klien</span> <i class="icon-bars2"></i></a></li>
                     <li><a href="?module=masalah"><span>Tambahkan Masalah</span> <i class="icon-plus"></i></a></li>
           
                    <li><a href="?module=data_masalah"><span>Data Masalah</span> <i class="icon-enter3"></i></a></li>        
            
            <li><a href="?module=laporan"><span>Laporan Jumlah Klien</span> <i class="icon-book"></i></a></li>
           
                    
                    
                 
				</ul>
				<!-- /main navigation -->
				
			</div>
		</div>
		<!-- /sidebar -->


		<!-- Page content -->
	 	<?php
			include "konten.php" ;
		?>
		<!-- /page content -->
<?php
include "footer.php" ;
?>

	</div>
