<?php
require_once("koneksi.php");
if(!empty($_POST["keyword"])) {
$query =mysql_query("SELECT * FROM klien WHERE nama like '" . $_POST['keyword'] . "%' ORDER BY nama LIMIT 0,6");
$result = mysql_fetch_array($query);
if(!empty($result)) {
?>
<ul id="klien-list">
<?php
foreach($result as $klien) {
?>
<li onClick="selectKlien('<?php echo $klien["nama"]; ?><?php echo $klien["id_klien"]; ?>');"><?php echo $klien["nama"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>
