<?php
if(isset($_POST['update'])){
	 //Identitas File
  
	$q=mysql_query("UPDATE user SET username='$_POST[username]', password='$_POST[password]' where id_user='$_POST[kd]'");
	
	if($q){
		echo "<script>alert('Berhasil Diupdate');document.location.href='?module=user';</script>";
	}else{
		echo "<script>alert('Gagal Update');document.location.href='?module=edit_user&id=$_POST[kd]';</script>";
  	}
}
?>