<?php
include "koneksi.php";
if(!empty($_POST["keyword"])) {
$query =mysql_query("SELECT * FROM klien WHERE id_klien like '%" . $_POST['keyword'] . "%' ORDER BY id_klien ASC LIMIT 0,6");
$result = mysql_num_rows($query);
if($result>0) {
?>
<ul id="klien-list">
<?php
while($klien=mysql_fetch_array($query)){
?>
<li onClick="selectKlien('<?php echo $klien['id_klien']; ?>#<?php echo $klien['nama']; ?>');"><?php echo $klien['id_klien']; ?></li>
<?php } ?>
</ul>
<?php } } ?>
