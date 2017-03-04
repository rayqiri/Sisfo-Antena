
<?php

?>
<div class="page-content">
			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Laporan Klien<small> Berikut adalah daftar Jumlah Klien CV. Raja Langit Network. silahahkan cetak per periode. dan simpan didalam arsip Anda</small></h3>
				</div>
				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="master.php">Dashboard</a></li>
                
					<li class="active">Data Klien</li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

				
			</div>
			<!-- /breadcrumbs line -->


			<!-- Callout
			<div class="callout callout-info fade in">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<h5>Intruksi</h5>
				<p>Silahkan Pilih Kriteria hotel yang Anda Inginkan</p>
			</div>
             /callout -->
			
            
            
<div class="row">
        		<div class="col-md-12">

            		<!-- Default panel --> 
		            <div class="panel panel-default">
		                <div class="panel-heading">
	                    	<h6 class="panel-title"><i class="icon-pencil3"></i> Laporan Jumlah Klien</h6>
                    	</div>
                    	<div class="panel-body">
                        <div align="right">
                        <a href="laporan_print.php" class="btn btn-info btn-xs">Cetak Fisik</a>
                        </div>
                        <div class="table-responsive">
<?php
// perhitungan offset
$q=mysql_query("select * from klien order by id_klien desc");
?>
<table class="table">
				                    <thead>
				                        <tr>
				                            <th>No</th>
				                            <th>Nama Klien</th>
				                            <th>Jenis Kelamin</th>
											<th>Alamat</th>								
				                            <th>No Telp</th>
				                            <th>Email</th>
                                            <th>Jenis Paket</th>
				                        </tr>
				                    </thead>
				                    <tbody>
                                    <?php 
									$no=0;
									while($r=mysql_fetch_array($q)){ $no++;?>
				                        <tr>
				                            <td><?php echo $no;?></td>
				                            <td><?php echo $r["nama"];?></td>
				                            <td><?php echo $r["jekel"];?></td>
											 <td><?php echo $r["alamat"];?></td>
				                           
                                            <td><?php echo $r["telp"];?></td>
                                            <td><?php echo $r["email"];?></td>
                                            <td><?php echo $r["jenis_paket"];?></td>
                                            
				                        </tr>
                                    <?php } ?>
				                       
				                    </tbody>
				                    <tr>
				                    <td colspan="7">Total Klien <?php echo $no;?></td></tr>
				                </table>
                                </div>
                                <hr>


					
                        </div>
                        
                    </div>
                    <!-- /default panel --> 
        		</div>
               
</div>


	        