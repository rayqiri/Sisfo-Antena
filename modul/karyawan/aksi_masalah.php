<?php
$id=$_GET['id'];
$ket=$_GET['ket'];
mysql_query("UPDATE masalah SET keterangan='$ket' WHERE id_masalah='$id'");
echo "<script>alert('Berhasil Diupdate');document.location.href='?module=data_masalah';</script>";

?>