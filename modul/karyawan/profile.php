<?php
$q=mysql_query("select * from klien where username='$_SESSION[user]'");
$r=mysql_fetch_array($q);
?>
<div class="page-content">

	<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Profil<small>Informasi Lengkap <?php echo $r['nama'];?></small></h3>
				</div>
				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?p=dashboard">Dashboard</a></li>
					<li class="active">Profil</li>
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
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-bell"></i> Preview Profil</h6></div>
                            <div class="panel-body">
<img src="img/klien/300_<?php echo $r["gambar"];?>" width="100%"/>
</div>
</div>
</div>

<div class="col-lg-9 col-md-9 col-sm-9">
<div class="panel panel-default">
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-bell"></i> Informasi Profile</h6></div>
			                <div class="table-responsive">
				                <table width="100%" class="table table-striped">
				                    <thead>
			                        </thead>
				                    <tbody>
				                        <tr>
				                            <td width="28%" valign="top">Nama</td>
				                            <td width="58%" valign="top"><strong><?php echo $r["nama"];?></strong></td>
				                        </tr>
				                        <tr>
				                            <td width="28%" valign="top">Alamat</td>
				                            <td width="58%" valign="top"><strong><?php echo $r["alamat"];?></strong></td>
				                        </tr>
				                        <tr>
				                            <td width="28%" valign="top">Jenis Kelamin</td>
				                            <td width="58%" valign="top"><strong><?php echo $r["jekel"];?></strong></td>
				                        </tr>
				                        <tr>
				                            <td width="28%" valign="top">No Telp</td>
				                            <td width="58%" valign="top"><strong><?php echo $r["telp"];?></strong></td>
				                        </tr>
				                        <tr>
				                            <td valign="top">Email</td>
				                            <td valign="top"><strong><?php echo $r["email"];?></strong></td>
				                        </tr>
				                        <tr>
				                          <td valign="top">Username</td>
				                          <td valign="top"><strong><?php echo $r["username"];?></strong></td>
			                          </tr>
				                        <tr>
				                          <td valign="top">Password</td>
				                          <td valign="top"><strong>********</strong></td>
			                          </tr>
				                        
                                        <tr>
                                          <td valign="top">Paket</td>
                                          <td valign="top"><strong><?php echo $r["jenis_paket"];?></strong></td>
                                        </tr>
                            
                                       
                                      
				                    </tbody>
				                </table>
			                </div>
</div>
</div>

</div>


	