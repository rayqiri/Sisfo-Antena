
<div class="page-content">
			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Laporan Login Aplikasi<small> Berikut adalah daftar login aplikasi</small></h3>
				</div>
				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="master.php">Dashboard</a></li>
                
					<li class="active">Data User Login</li>
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
	                    	<h6 class="panel-title"><i class="icon-pencil3"></i> Data User Login</h6>
                    	</div>
                    	<div class="panel-body">
                        <div align="right">
                         
                        
                        </div>
                        
<?php

$q=mysql_query("select * from user");
?>
<div class="table-responsive">
<table class="table">
				                    <thead>
				                        <tr>
				                            <th>No</th>
				                            <th>Username</th>
				                            <th>Hak Akses</th>
				                            <th>Terakhir Login</th>
                                            
				                        </tr>
				                    </thead>
				                    <tbody>
                                    <?php 
									$no=0;
									while($r=mysql_fetch_array($q)){ $no++;
										
										?>

				                        <tr>
				                            <td><?php echo $no;?></td>
				                            <td><?php echo $r["username"];?></td>
				                            <td><?php echo $r["hak_akses"];?></td>
											 <td><?php echo $r["login_at"];?></td>
				                          
				                        </tr>
                                    <?php } ?>
				                       
				                    </tbody>
				                    
				                </table>
                                
                                <hr>


					<div class="text-center block">


</div>
</div>

                        </div>
                        
                    </div>
                    <!-- /default panel --> 
        		</div>
               
</div>


	        