
<?php
$id = isset($_GET['id']) ? $_GET['id'] : "";
$q=mysql_query("select * from masalah where id_masalah='$id'");
$r=mysql_fetch_array($q);
?>
<div class="page-content">
			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Tambah & Edit Masalah<small> Silahkan lengkapi formulir berikut untuk menambahkan / Memperbaharui Data Masalh</small></h3>
				</div>
				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?p=dashboard">Dashboard</a></li>
                
					<li class="active">Tambah & Edit  Masalah</li>
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
	                    	<h6 class="panel-title"><i class="icon-pencil3"></i> Form Masalah</h6>
                    	</div>
                    	<div class="panel-body">
                        <form method="post" action="?module=aksi_masalah" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $r["id_masalah"];?>" name="kd" />
                        <div class="form-group">
							<label class="col-sm-3 control-label">Nama Klien: </label>
							<div class="col-sm-9">
								<select name="nama" class="form-control" required>
                                     <option value="">Pilih : </option>
                                     <?php
                                     $sql = mysql_query("SELECT * FROM klien");
                                     while($ada=mysql_fetch_array($sql)){
                                     ?>
										<option value="<?php echo $ada['id_klien'];?>" <?php if($ada['id_klien']==$r['id_klien']){echo "selected";}?>><?php echo $ada['nama'];?></option>
                                       <?php
                                       	}
                                       ?>
                                </select>
							</div>
						</div>
						
                        <div class="form-group">
							<label class="col-sm-3 control-label">Permasalahan: </label>
							<div class="col-sm-9">
								<textarea name="masalah" required="required" class="form-control" col="4" rows="7"><?php echo $r['permasalahan'];?></textarea>
							</div>
						</div>
                        
                       
                        
                       
                        
                        
                          <div class="form-actions text-right">
                          <button type="button" class="btn btn-default" name="back" onclick="history.go(-1)">Kembali</button>
							<button type="reset" class="btn btn-default" name="reset">Reset</button>
                            <button type="submit" class="btn btn-primary" name="update">Simpan Data</button>
						</div>
                        </form>
                        </div>
                        
                    </div>
                    <!-- /default panel --> 
        		</div>
               
</div>



	        <!-- Footer -->
	      
	        <!-- /footer -->