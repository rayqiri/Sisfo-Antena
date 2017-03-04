<style>
a {
	color:#F00;
}
.subtitle{
	float:right;
}
</style>
<?php
error_reporting(0);
include('koneksi.php');
include('fungsi/fungsi.php');
$id=$_GET['loc'];
$lat=$_GET['lat'];
$lng=$_GET['lng'];
		$sql_lokasi="select * from klien where id_klien='$id' ";
            	$result=mysql_query($sql_lokasi);
            	$data=mysql_fetch_object($result);
    echo "<div id=\"content\">
    <div id=\"siteNotice\">
    </div>
    <h4 id=\"firstHeading\" class=\"firstHeading\">$data->nama</h4>
    <div id=\"bodyContent\"><p>
    <img width=150px src=\"img/klien/$data->gambar\" >
	
    <div id=\"subtitle\">
	<ul class=\"subtitle\">
    <li> Kontak : $data->telp</li> 
    <li> Alamat : $data->alamat</li><li>Paket : $data->jenis_paket
	
	</li></ul>
	</div>
	<a href=\"?module=detail_klien&id=$data->id_klien\" class=\"btn btn-info\"><i class=\"icon-search\" ></i> Detail</a>
    </div></div>";
	
?>
