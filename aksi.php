<?php


//password
//ubah
if(isset($_POST['updatepass'])){
		$q=mysql_query("update user set 
		password=md5('$_POST[pwbaru]') where username='$_SESSION[user]'");
	
	if($q){
		echo "<script>alert('Password Berhasil Dirubah');document.location.href='password.php';</script>";
	}else{
		echo "<script>alert('Password Gagal Dirubah');document.location.href='password.php';</script>";
  	}
}
?>