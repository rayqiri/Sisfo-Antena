<?php
include "koneksi.php";
include "fungsi/fungsi_indotgl.php";
include "fungsi/fungsi.php";
//nama file: index.php
//$page = isset($_GET['page']) ? $_GET['page'] : null;
//atau:
//$page = isset($_GET['page']) ? $_GET['page'] : false;
//atau bisa juga dengan:
//$page = isset($_GET['page']) ? $_GET['page'] : "";
$module = isset($_GET['module']) ? $_GET['module'] : "";

// Login ukm//
if ($_SESSION['hak_akses'] == 'admin'){
	// bagian input data mahasiswa
	if ($module == 'klien'){
		include "modul/admin/klien.php";
	}
	elseif ($module == 'aksi_klien'){
		include "modul/admin/aksi_klien.php";
	}
	elseif ($module == 'edit_klien'){
		include "modul/admin/edit_klien.php";
	}
	elseif ($module == 'data_klien'){
		include "modul/admin/data_klien.php";
	}
	elseif ($module == 'detail_klien'){
		include "modul/admin/detail_klien.php";
	}
	elseif ($module == 'password'){
		include "password.php";
	}
	elseif ($module == 'aksi'){
		include "aksi.php";
	}
	elseif ($module == 'sms'){
		include "modul/admin/sms.php";
	}
	elseif ($module == 'data_masalah'){
		include "modul/admin/data_masalah.php";
	}
	elseif ($module == 'masalah'){
		include "modul/admin/masalah.php";
	}
	elseif ($module == 'aksi_masalah'){
		include "modul/admin/aksi_masalah.php";
	}
	elseif ($module == 'edit_masalah'){
		include "modul/admin/edit_masalah.php";
	}
	elseif ($module == 'edit_karyawan'){
		include "modul/admin/edit_karyawan.php";
	}
	elseif ($module == 'karyawan'){
		include "modul/admin/karyawan.php";
	}
	elseif ($module == 'aksi_karyawan'){
		include "modul/admin/aksi_karyawan.php";
	}
	elseif ($module == 'data_karyawan'){
		include "modul/admin/data_karyawan.php";
	}
	elseif ($module == 'hapus_karyawan'){
		include "modul/admin/hapus_karyawan.php";
	}
	elseif ($module == 'laporan'){
		include "modul/admin/laporan.php";
	}
	elseif ($module == 'profile'){
		include "modul/admin/profile.php";
	}
	elseif ($module == 'ajax_klien'){
		include "modul/admin/ajax_klien.php";
	}
	elseif ($module == 'masalah_excel'){
		include "modul/admin/masalah_excel.php";
	}
	elseif ($module == 'masalah_print'){
		include "modul/admin/masalah_print.php";
	}
	elseif ($module == 'laporan_excel'){
		include "modul/admin/masalah_excel.php";
	}
	elseif ($module == 'laporan_print'){
		include "modul/admin/masalah_print.php";
	}
	elseif ($module == 'user'){
		include "modul/admin/user.php";
	}
	elseif ($module == 'reset_user'){
		include "modul/admin/reset_user.php";
	}
	elseif ($module == 'edit_user'){
		include "modul/admin/edit_user.php";
	}
	elseif ($module == 'aksi_user'){
		include "modul/admin/aksi_user.php";
	}
	elseif ($module == 'detail_karyawan'){
		include "modul/admin/detail_karyawan.php";
	}
	elseif ($module == 'panduan'){
		include "modul/admin/panduan.php";
	}
	elseif ($module == 'data_login'){
		include "modul/admin/data_login.php";
	}
	elseif ($module == 'pesan'){
		include "modul/admin/pesan.php";
	}
	elseif ($module == 'aksi_pesan'){
		include "modul/admin/aksi_pesan.php";
	}
	else{
		include "modul/mod_home/dashboard.php";
	}
	
}

// Login Staff //
elseif ($_SESSION['hak_akses'] == 'karyawan'){
	// bagian manajemen dosen
	if ($module == 'data_klien'){
		include "modul/karyawan/data_klien.php";
	}
	else if ($module == 'data_masalah'){
		include "modul/karyawan/data_masalah.php";
	}
	else if ($module == 'detail_klien'){
		include "modul/karyawan/detail_klien.php";
	}
	else if ($module == 'profile'){
		include "modul/karyawan/profile.php";
	}
	elseif ($module == 'aksi_masalah'){
		include "modul/karyawan/aksi_masalah.php";
	}
	elseif ($module == 'panduan'){
		include "modul/karyawan/panduan.php";
	}
	else{
		include "modul/mod_home/dashboard.php";
	}
}
elseif ($_SESSION['hak_akses'] == 'karyawan_tetap'){
	// bagian manajemen dosen
	 if ($module == 'data_masalah'){
		include "modul/karyawan_tetap/data_masalah.php";
	}
	else if ($module == 'profile'){
		include "modul/karyawan_tetap/profile.php";
	}
	elseif ($module == 'aksi_masalah'){
		include "modul/karyawan_tetap/aksi_masalah.php";
	}
	elseif ($module == 'panduan'){
		include "modul/karyawan_tetap/panduan.php";
	}
	else{
		include "modul/mod_home/dashboard.php";
	}
}
// Tidak Mempunyai Hak Akses
else{
	echo "<script language='javascript'>alert('Anda tidak mempunyai hak akses memasuki halaman ini.');
			window.location = 'master.php'</script>";
}
?>