<?php
$id=$_GET['id'];
$username=$_GET['username'];
mysql_query("UPDATE user SET password='$username' WHERE id_user='$id'");
echo "<script>alert('Username Tereset');document.location.href='?module=user';</script>";

?>