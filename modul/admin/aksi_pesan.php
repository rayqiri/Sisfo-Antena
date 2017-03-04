<?php
if(isset($_POST['add'])){
$pesan=$_POST['pesan'];
$sql=mysql_query("SELECT * FROM klien");
while($data=mysql_fetch_array($sql)){
$nohp=$data['telp'];
$query = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID)
VALUES ('$nohp', '$pesan', 'Gammu')";
$hasil = mysql_query($query);
}
echo "<script language='javascript'>alert('SMS BERHASIL DIKIRIM');window.location.href='?module=data_masalah';</script>";

}
?>