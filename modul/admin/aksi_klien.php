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
  $dir_upload = "img/klien/";     
  $file_upload = $dir_upload.$nama_file_unik;
  $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
  
  
  if (!empty($lokasi_file)){
	   //cek upload    
  		if(file_exists($file_upload)){ $err_upload=1;}
 		if($ukuran_file > $ukuran_max){ $err_upload=1;} 
  		$allowed = array('JPG','jpg','png','gif');
		if( ! in_array( $ext, $allowed ) ) {$err_upload=1;}
		
		if($err_upload){    
     		echo "<script>alert('Gagal Upload');document.location.href='?module=klien';</script>";
			exit(0);    
		}else{
  			Uploadklien($nama_file_unik);
		}
  }else{
  	$nama_file_unik="default.jpg";
  }
 
  //Tentukan Kode hotel
	$q=mysql_query("INSERT INTO klien SET id_klien='$_POST[kd]',nama='$_POST[nama]', alamat='$_POST[alamat]', telp='$_POST[telp]',email='$_POST[email]', jenis_paket='$_POST[paket]', jekel='$_POST[jekel]', gambar='$nama_file_unik',lat='$_POST[lat]', lng='$_POST[lng]', id_kecamatan='$_POST[kecamatan]', ip_address='$_POST[ipaddress]',mac_address='$_POST[mac]'");
		if($q>0){
    echo "<script>alert('Berhasil Disimpan');document.location.href='?module=data_klien';</script>";
  }else{
    echo "<script>alert('Gagal Disimpan');document.location.href='?module=klien;</script>";
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
  $dir_upload = "img/klien/";     
  $file_upload = $dir_upload.$nama_file_unik;
  $ext = pathinfo($nama_file, PATHINFO_EXTENSION);

  //Dapatkan data gambar jika ada
  $x=mysql_query("select gambar From klien where id_klien='$_POST[kd]'");
  $y=mysql_fetch_array($x);
  
  if (!empty($lokasi_file)){
	   //cek upload    
  		if(file_exists($file_upload)){ $err_upload=1;}
 		if($ukuran_file > $ukuran_max){ $err_upload=1;} 
  		$allowed = array('jpg','png','gif');
		if( ! in_array( $ext, $allowed ) ) {$err_upload=1;}
		
		if($err_upload){    
     		echo "<script>alert('Gagal Upload');document.location.href='?module=edit_klien&id=$_POST[kd]';</script>";
			exit(0);    
		}else{
			if($y["gambar"]!="default.jpg"){
				unlink("img/klien/$y[gambar]");
				unlink("img/klien/300_$y[gambar]");
			}
  			Uploadklien($nama_file_unik);
		}
  }else{
  		$nama_file_unik=$y["gambar"];
  }
	
	$q=mysql_query("UPDATE klien SET nama='$_POST[nama]', alamat='$_POST[alamat]', id_kecamatan='$_POST[kecamatan]', telp='$_POST[telp]', jenis_paket='$_POST[paket]', jekel='$_POST[jekel]',email='$_POST[email]', gambar='$nama_file_unik',lat='$_POST[lat]', lng='$_POST[lng]', id_kecamatan='$_POST[kecamatan]', ip_address='$_POST[ipaddress]', mac_address='$_POST[mac]' where id_klien='$_POST[kd]'");
	
	if($q){
		echo "<script>alert('Berhasil Diupdate');document.location.href='?module=data_klien';</script>";
	}else{
		echo "<script>alert('Gagal Update');document.location.href='?module=edit_klien&id=$_POST[kd]';</script>";
  	}
}
//
 //hapus
$act=isset($_GET['act']) ? $_GET['act'] : "";
if($act=="del"){
	       
				$x=mysql_query("select gambar From klien where id_klien='$_GET[id]'");
				$y=mysql_fetch_array($x);
				if($y["gambar"]!="default.jpg"){
					unlink("img/klien/$y[gambar]");
					unlink("img/klien/300_$y[gambar]");
				}
				$q=mysql_query("Delete From klien where id_klien='$_GET[id]'");
				if($q){
				echo "<script>alert('Berhasil Dihapus');document.location.href='?module=data_klien';</script>";
			}else{
				echo "<script>alert('Gagal Hapus');document.location.href='?module=data_klien';</script>";
  			}
}

?>