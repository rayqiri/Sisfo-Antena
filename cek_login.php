<?php
include "koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}
$username= anti_injection($_POST['username']);
$pass	 = anti_injection($_POST['password']);
#$pass = anti_injection($_POST['password']);
// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
//  echo "Sekarang loginnya tidak bisa di injeksi lho.";
?>
<script>
	alert('Maaf Anda Tidak Bisa Login');
	window.location.href='index.php';
</script>
<?php
}else{


session_start();

$login = mysql_query("SELECT * FROM user where username='$username' and password='$pass'");
$data	= mysql_fetch_array($login);
if (mysql_num_rows($login) > 0){
	mysql_query("UPDATE user SET login_at=now() where username='$username' and password='$pass'");
	if($data['hak_akses']=="admin"){
$_SESSION['hak_akses'] = $data['hak_akses'];
$_SESSION['user'] = $data['username'];
}else if($data['hak_akses']=="karyawan_tetap"){
$_SESSION['hak_akses'] = $data['hak_akses'];
$_SESSION['user'] = $data['username'];
}
else{
	$a=mysql_fetch_array(mysql_query("select * from karyawan where username='$username'"));
	$_SESSION['hak_akses'] = $data['hak_akses'];
	$_SESSION['user'] = $data['username'];
	$_SESSION['kec'] = $a['id_kecamatan'];
}
header("location:master.php");
}else{
echo "<script>alert('Username atau Password salah')
	window.location='index.php'</script>";
}
}


?>
