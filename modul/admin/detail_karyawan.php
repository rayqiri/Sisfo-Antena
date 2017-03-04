<?php
$id=$_GET['id'];
$q=mysql_query("select * from karyawan,kecamatan where karyawan.id_kecamatan=kecamatan.id_kecamatan and id_karyawan='$id'");
$r=mysql_fetch_array($q);

?>
<div class="page-content">

	<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Detail Karyawan<small>Informasi Lengkap tentang Karyawan</small></h3>
				</div>
				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?p=beranda">Beranda</a></li>
					<li class="active">Detail Karyawan</li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

				
			</div>
			<!-- /breadcrumbs line -->


			<!-- Callout 
			<div class="callout callout-info fade in">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<h5>Instruksi</h5>
				<p>Klik Salah satu hotel untuk melihat detail hotel, daftar kamar dan lokasinya.</p>
			</div>
           /callout -->
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-3">
<div class="panel panel-default">
<div class="panel-heading"><h6 class="panel-title"><i class="icon-bell"></i> Preview Karyawan</h6></div>
<div class="panel-body">
<img src="img/karyawan/<?php echo $r["gambar"];?>" width="100%"/>
</div>
</div>
</div>

<div class="col-lg-9 col-md-9 col-sm-9">
<div class="panel panel-default">
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-bell"></i> Informasi Karyawan</h6></div>
			                <div class="table-responsive">
				                <table width="100%" class="table table-striped">
				                    <thead>
			                        </thead>
				                    <tbody>
				                        <tr>
				                            <td width="28%" valign="top">Nama Karyawan</td>
				                            <td width="58%" valign="top"><strong><?php echo $r["nama_karyawan"];?></strong> 
											
											</td>
				                        </tr>
				                        <tr>
				                            <td width="28%" valign="top">Kode Karyawan</td>
				                            <td width="58%" valign="top"><strong><?php echo $r["id_karyawan"];?></strong> 
											
											</td>
				                        </tr>
				                        <tr>
				                            <td width="28%" valign="top">Jenis Kelamin</td>
				                            <td width="58%" valign="top"><strong><?php echo $r["jekel"];?></strong> 
											</td>
				                        </tr>
				                        <tr>
				                            <td valign="top">No Telp</td>
				                            <td valign="top"><strong><?php echo $r["telp"];?></strong></td>
				                        </tr>
				                        <tr>
				                          <td valign="top">Alamat</td>
				                          <td valign="top"><strong><?php echo $r["alamat"];?></strong></td>
			                          </tr>
                                      <tr>
				                          <td valign="top">Email</td>
				                          <td valign="top"><strong>
										  <?php 
										 echo $r["email"];
										  ?></strong></td>
			                          </tr>
				                        
			                          <tr>
				                          <td valign="top">Area Tugas</td>
				                          <td valign="top"><strong><?php echo $r["kecamatan"];?></strong></td>
			                          </tr>
				                       
                                        <tr>
				                            <td valign="top">Action</td>
				                            <td valign="top">
                                            <a onclick="history.go(-1)" class="btn btn-default btn-xs">Kembali</a>
                                            </td>
				                        </tr>
                                        
				                    </tbody>
				                </table>
			                </div>
</div>
</div>

</div>


	        <!-- Page tabs -->
            