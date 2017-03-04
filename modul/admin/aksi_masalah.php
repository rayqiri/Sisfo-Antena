<?php

//Tambah
if(isset($_POST['add'])){
  //Identitas File
 
  //Tentukan Kode hotel
	$a=mysql_num_rows(mysql_query("select * from klien where id_klien='$_POST[nama]'"));
if ($a==0){
	echo "<script>alert('Id Klien Tidak Cocok');document.location.href='?module=masalah';</script>";
	}else{
$c=mysql_num_rows(mysql_query("SELECT * FROM masalah WHERE id_klien='$_POST[nama]' AND keterangan='Belum Terselesaikan' OR keterangan='Tertunda'"));
            if ($c>0){
            	echo "<script>alert('masih mempunyai masalah yang belum terselesaikan');document.location.href='?module=masalah';</script>";
            }else{	
$b=mysql_fetch_array(mysql_query("SELECT id_karyawan FROM karyawan,klien WHERE karyawan.id_kecamatan=klien.id_kecamatan AND klien.id_klien='$_POST[nama]'"));
  $ket="Belum Terselesaikan";
  $karyawan=$b['id_karyawan'];
  $tgl=date("Y-m-d");
	$q=mysql_query("INSERT INTO masalah (id_klien,id_karyawan,tanggal,permasalahan,keterangan) values('$_POST[nama]','$karyawan','$tgl','$_POST[masalah]','$ket')");
		if($q){
    echo "<script>alert('Berhasil Disimpan');document.location.href='?module=data_masalah';</script>";
  }else{
    echo "<script>alert('Gagal Disimpan');document.location.href='?module=masalah';</script>";
    }
	}
  }
}
//ubah
if(isset($_POST['update'])){
	 //Identitas File
  $tgl=date("Y-m-d");
  $ket="Masalah Selesai";
  $b=mysql_fetch_array(mysql_query("SELECT id_karyawan FROM karyawan,klien WHERE karyawan.id_kecamatan=klien.id_kecamatan AND klien.id_klien='$_POST[nama]'"));
   $karyawan=$b['id_karyawan'];
	$q=mysql_query("UPDATE masalah SET id_klien='$_POST[nama]',id_karyawan='$karyawan', permasalahan='$_POST[masalah]', tanggal='$tgl', keterangan='$ket' where id_masalah='$_POST[kd]'");
	
	if($q){
		echo "<script>alert('Berhasil Diupdate');document.location.href='?module=data_masalah';</script>";
	}else{
		echo "<script>alert('Gagal Update');document.location.href='?module=edit_masalah&id=$_POST[kd]';</script>";
  	}
}
//
 //hapus
$act=isset($_GET['act']) ? $_GET['act'] : "";
if($act=="del"){
	
				
				$q=mysql_query("DELETE FROM masalah where id_masalah='$_GET[id]'");
				if($q){
				echo "<script>alert('Berhasil Dihapus');document.location.href='?module=data_masalah';</script>";
			}else{
				echo "<script>alert('Gagal Hapus');document.location.href='?module=data_masalah';</script>";
  			}
}

?>