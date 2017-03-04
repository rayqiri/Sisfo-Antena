<?php
session_start();

if ($_SESSION['hak_akses'] == 'admin'){
		include "master/admin.php";
	}
	
	elseif ($_SESSION['hak_akses'] == 'karyawan') {
		include "master/karyawan.php";
	}
	else{
		include "master/karyawan_tetap.php";
	}

?>