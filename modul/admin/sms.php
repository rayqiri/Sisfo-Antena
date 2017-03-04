<?php
$id=$_GET['id'];
$kec=$_GET['kec'];
$nama=$_GET['nama'];
$masalah=$_GET['masalah'];
$tanggal=$_GET['tgl'];
$alamat = $_GET['alamat'];
$data=mysql_fetch_array(mysql_query("select * from karyawan where id_kecamatan='$kec'"));
$nohp=$data['telp'];
$nama2=$data['nama_karyawan'];
$message="Kepada ".$nama2.", Pelanggan dengan nama ".$nama." yang beralaman ".$alamat." komplain dengan masalah ".$masalah.". Mohan masalah tersebut segera diselesaikan.<br>
Link maps= http://localhost/antena/maps.php?id=".$id;
exec('c:\gammu\gammu-smsd-inject.exe -c c:\gammu\smsdrc EMS '.$nohp.' -text
"'.$message.'"');
$query = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID)
VALUES ('$nohp', '$message', 'Gammu')";
$hasil = mysql_query($query);
if ($hasil) echo "<script language='javascript'>alert('SMS BERHASIL DIKIRIM');window.location.href='?module=data_masalah';</script>";
else echo "<script language='javascript'>alert('SMS GAGAL DIKIRIM');window.location.href='?module=data_masalah';</script>";

?>