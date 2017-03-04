<?php

//Tambah
if(isset($_POST['add'])){
  //Identitas File
  $lokasi_file    = $_FILES['gambar']['tmp_name'];
  $tipe_file      = $_FILES['gambar']['type'];
  $nama_file      = $_FILES['gambar']['name'];
  $ukuran_file	  = $_FILES['gambar']['size'];  
  $acak           = acak(5).rand(1,99999);
  $nama_file_unik = $acak.$nama_file;
  
  //Definisi Variabel
  $err_upload=0;
  $ukuran_max=1000000; 
  $dir_upload = "img/karyawan/";     
  $file_upload = $dir_upload.$nama_file_unik;
  $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
  
  
  if (!empty($lokasi_file)){
	   //cek upload    
  		if(file_exists($file_upload)){ $err_upload=1;}
 		if($ukuran_file > $ukuran_max){ $err_upload=1;} 
  		$allowed = array('JPG','jpg','png','gif');
		if( ! in_array( $ext, $allowed ) ) {$err_upload=1;}
		
		if($err_upload){    
     		echo "<script>alert('Gagal Upload');document.location.href='?module=karyawan';</script>";
			exit(0);    
		}else{
  			Uploadkaryawan($nama_file_unik);
		}
  }else{
  	$nama_file_unik="default.jpg";
  }
  $sql=mysql_num_rows(mysql_query("SELECT * FROM karyawan where username='$_POST[username]' or id_kecamatan='$_POST[kecamatan]'"));
if ($sql > 0){ 
	echo "<script>alert('Username ".$_POST['username']." Sudah Ada Atau Sudah ada Karyawan Dikecamatan Di DB');document.location.href='?module=karyawan';</script>";
}else{
  //Tentukan Kode hotel
  $hak="karyawan";
	mysql_query("INSERT INTO user (username,password,hak_akses) values('$_POST[username]','$_POST[password]','$hak')");
	mysql_query("INSERT INTO karyawan SET id_karyawan='$_POST[kd]',nama_karyawan='$_POST[nama]', alamat='$_POST[alamat]', telp='$_POST[telp]',email='$_POST[email]', id_kecamatan='$_POST[kecamatan]', jekel='$_POST[jekel]', gambar='$nama_file_unik',status='$_POST[status]', username='$_POST[username]'");
		
    echo "<script>alert('Berhasil Disimpan');document.location.href='?module=data_karyawan';</script>";
  
  }
}
//ubah
if(isset($_POST['update'])){
	 //Identitas File
  $lokasi_file    = $_FILES['gambar']['tmp_name'];
  $tipe_file      = $_FILES['gambar']['type'];
  $nama_file      = $_FILES['gambar']['name'];
  $ukuran_file	  = $_FILES['gambar']['size'];  
  $acak           = acak(5).rand(1,99999);
  $nama_file_unik = $acak.$nama_file;
  
  //Definisi Variabel
  $err_upload=0;
  $ukuran_max=1000000; 
  $dir_upload = "img/karyawan/";     
  $file_upload = $dir_upload.$nama_file_unik;
  $ext = pathinfo($nama_file, PATHINFO_EXTENSION);

  //Dapatkan data gambar jika ada
  $x=mysql_query("select gambar from karyawan where id_karyawan='$_POST[kd]'");
  $y=mysql_fetch_array($x);
  
  if (!empty($lokasi_file)){
	   //cek upload    
  		if(file_exists($file_upload)){ $err_upload=1;}
 		if($ukuran_file > $ukuran_max){ $err_upload=1;} 
  		$allowed = array('jpg','png','gif');
		if( ! in_array( $ext, $allowed ) ) {$err_upload=1;}
		
		if($err_upload){    
     		echo "<script>alert('Gagal Upload');document.location.href='?module=edit_karyawann&id=$_POST[kd]';</script>";
			exit(0);    
		}else{
			if($y["gambar"]!="default.jpg"){
				unlink("img/karyawan/$y[gambar]");
				unlink("img/karyawan/300_$y[gambar]");
			}
  			Uploadkaryawan($nama_file_unik);
		}
  }else{
  		$nama_file_unik=$y["gambar"];
  }
	
	$q=mysql_query("UPDATE karyawan SET nama_karyawan='$_POST[nama]', alamat='$_POST[alamat]', telp='$_POST[telp]', id_kecamatan='$_POST[kecamatan]', jekel='$_POST[jekel]',email='$_POST[email]', gambar='$nama_file_unik',status='$_POST[status]' where id_karyawan='$_POST[kd]'");
	
	if($q){
		echo "<script>alert('Berhasil Diupdate');document.location.href='?module=data_karyawan';</script>";
	}else{
		echo "<script>alert('Gagal Update');document.location.href='?module=edit_karyawan&id=$_POST[kd]';</script>";
  	}
}
//
 //hapus

?>