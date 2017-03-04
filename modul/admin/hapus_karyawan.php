	<?php
	$a=mysql_num_rows(mysql_query("SELECT * FROM masalah WHERE id_karyawan='$_GET[id]' AND keterangan='Belum Terselesaikan'"));
	if($a>0){
echo "<script>alert('Gagal Hapus, Karyawan Masih Mempunyai Masalah yang belum terselesaikan.');document.location.href='?module=data_karyawan';</script>";
	}else{


	$x=mysql_query("select * From karyawan where id_karyawan='$_GET[id]'");
				$y=mysql_fetch_array($x);
				if($y["gambar"]!="default.jpg"){
					unlink("img/karyawan/$y[gambar]");
					unlink("img/karyawan/300_$y[gambar]");
				}
				mysql_query("Delete From user where username='$y[username]'");
				$q=mysql_query("Delete From karyawan where id_karyawan='$_GET[id]'");
				if($q){
				echo "<script>alert('Berhasil Dihapus');document.location.href='?module=data_karyawan';</script>";
			}else{
				echo "<script>alert('Gagal Hapus');document.location.href='?module=data_karyawan';</script>";
  			}
  		}
  			?>