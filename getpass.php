<?php
include "koneksi.php";
session_start();
$kd = $_GET['id'];

	$q = mysql_query("SELECT * FROM user WHERE username='$_SESSION[user]' and password=md5('$kd')");


if(mysql_num_rows($q)!=0){
echo "<i class='icon-checkmark3'></i> Password Benar";
}else{
echo "<i class='icon-close'></i> Password Salah";
echo "<input type='password' name='pw' id='pw' value=''>";
}
?>
