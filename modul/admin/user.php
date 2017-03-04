
<?php

?>
<div class="page-content">
			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>User<small> Berikut adalah daftar Jumlah User CV. Raja Langit Network.</small></h3>
				</div>
				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="master.php">Dashboard</a></li>
                
					<li class="active">Data User</li>
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
	                    	<h6 class="panel-title"><i class="icon-pencil3"></i>User</h6>
                    	</div>
                    	<div class="panel-body">
                        <div align="right">
                       <!-- <a href="laporan_print.php" class="btn btn-info btn-xs">Cetak Fisik</a>-->
                        </div>
                        <div class="table-responsive">
<?php
// perhitungan offset
$q=mysql_query("select * from user order by id_user desc");
?>
<table class="table">
				                    <thead>
				                        <tr>
				                            <th>No</th>
				                            <th>Username</th>
				                            <th>Password</th>
											<th>Hak Akses</th>
											<th>Action</th>								
				                        </tr>
				                    </thead>
				                    <tbody>
                                    <?php 
									$no=0;
									while($r=mysql_fetch_array($q)){ $no++;?>
				                        <tr>
				                            <td><?php echo $no;?></td>
				                            <td><?php echo $r["username"];?></td>
				                            <td><?php echo $r["password"];?></td>
											 <td><?php echo $r["hak_akses"];?></td>
				                           <td><a href="?module=edit_user&id=<?php echo $r['id_user'];?>" class="btn btn-primary btn-xs">Edit</a><a href="?module=reset_user&id=<?php echo $r['id_user'];?>&username=<?php echo $r['username'];?>" class="btn btn-info btn-xs">Reset Password</a></td>
                                            
                                            
				                        </tr>
                                    <?php } ?>
				                       
				                    </tbody>
				                </table>
                                </div>
                                <hr>


					
                        </div>
                        
                    </div>
                    <!-- /default panel --> 
        		</div>
               
</div>


	        