
<?php
$id = isset($_GET['id']) ? $_GET['id'] : "";
$q=mysql_query("select * from user where id_user='$id'");
$r=mysql_fetch_array($q);
?>
<div class="page-content">
			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Edit User<small> Silahkan lengkapi formulir berikut untuk Memperbaharui Data User</small></h3>
				</div>
				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?p=dashboard">Dashboard</a></li>
                
					<li class="active">Edit  User</li>
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
	                    	<h6 class="panel-title"><i class="icon-pencil3"></i> Form User</h6>
                    	</div>
                    	<div class="panel-body">
                        <form method="post" action="?module=aksi_user" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $r["id_user"];?>" name="kd" />
                        <div class="form-group">
							<label class="col-sm-3 control-label">Username: </label>
							<div class="col-sm-9">
								<input name="username" type="text" class="form-control" value="<?php echo $q['username'];?>">
							</div>
						</div>
						
                        <div class="form-group">
							<label class="col-sm-3 control-label">Password: </label>
							<div class="col-sm-9">
								<input name="password" type="password" class="form-control" value="<?php echo $q['password'];?>">
							</div>
						</div>
                        
                       
                        
                       
                        
                        
                          <div class="form-actions text-right">
                          <button type="button" class="btn btn-default" name="back" onclick="history.go(-1)">Kembali</button>
							
                            <button type="submit" class="btn btn-primary" name="update">Edit Data</button>
						</div>
                        </form>
                        </div>
                        
                    </div>
                    <!-- /default panel --> 
        		</div>
               
</div>



	        <!-- Footer -->
	      
	        <!-- /footer -->