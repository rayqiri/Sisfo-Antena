<?php
$id = isset($_GET['id']) ? $_GET['id'] : "";
$q=mysql_query("select * from karyawan where id_karyawan='$id'");
$r=mysql_fetch_array($q);
?>
<div class="page-content">
			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Edit Karyawan<small> Silahkan lengkapi formulir berikut untuk merubah Data Karyawan</small></h3>
				</div>
				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?p=dashboard">Dashboard</a></li>
                
					<li class="active">Edit Karyawan</li>
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
        		<div class="col-md-7">

            		<!-- Default panel --> 
		            <div class="panel panel-default">
		                <div class="panel-heading">
	                    	<h6 class="panel-title"><i class="icon-pencil3"></i> Form Karyawan</h6>
                    	</div>
                    	<div class="panel-body">
                        <form method="post" action="?module=aksi_karyawan" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $r["id_karyawan"];?>" name="kd" />
                        <div class="form-group">
							<label class="col-sm-3 control-label">Nama Karyawan: </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="nama" placeholder="Nama Karyawan" required="required" autofocus="autofocus" value="<?php echo $r["nama_karyawan"];?>">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Jenis Kelamin: </label>
							<div class="col-sm-9">
        
                                <select name="jekel" class="form-control" required>
                                     <option value="">Pilih : </option>
										<option value="laki-laki" <?php if($r['jekel']=="laki-laki"){echo "selected";}?>>Laki-laki</option>
                                        <option value="perempuan" <?php if($r['jekel']=="perempuan"){echo "selected";}?>>Perempuan</option>
                                </select>
							</div>
						</div>
						
						
                         <div class="form-group">
							<label class="col-sm-3 control-label">Alamat: </label>
							<div class="col-sm-9">
								<input name="alamat" type="text" required="required" class="form-control" id="alamat" placeholder="Alamat" value="<?php echo $r["alamat"];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Kecamatan: </label>
							<div class="col-sm-9">
        						<input type="hidden" value="<?php echo $r['id_kecamatan'];?>" name="kecamatan" />
                                <select class="form-control" disabled>
                                     <option value="">Pilih Kecamatan : </option>
                                        <?php
                                        $sql=mysql_query("SELECT * FROM kecamatan");
                                        while($ada=mysql_fetch_array($sql)){
                                        ?>
                                        <option value="<?php echo $ada['id_kecamatan'];?>" <?php if($r['id_kecamatan']==$ada['id_kecamatan']){echo "selected";}?>><?php echo $ada['kecamatan'];?></option>

                                        <?php
                                    }
                                        ?>
                                </select>

                               
							</div>
						</div>
                        <div class="form-group">
							<label class="col-sm-3 control-label">No Telp: </label>
							<div class="col-sm-9">
								<input name="telp" type="text" required="required" class="form-control" id="kontak" placeholder="No Telp" value="<?php echo $r["telp"];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Email: </label>
							<div class="col-sm-9">
								<input name="email" type="text" required="required" class="form-control" id="kontak" placeholder="E-Mail" value="<?php echo $r["email"];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Status: </label>
							<div class="col-sm-9">
        
                                <select name="status" class="form-control" required>
                                     <option value="">Pilih : </option>
										<option value="Aktif" <?php if($r['jekel']=="Aktif"){echo "selected";}?>>Aktif</option>
                                        <option value="Non Aktif" <?php if($r['jekel']=="Non Aktif"){echo "selected";}?>>Non Aktif</option>
                                </select>
							</div>
						</div>
						 <div class="form-group">
							<label class="col-sm-3 control-label">Foto: </label>
							<div class="col-sm-9">
								<input type="file"  name="gambar">
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

            <div class="col-md-5">

                    <!-- Panel with icon --> 
		            <div class="panel panel-default">
		                <div class="panel-heading">
	                    	<h6 class="panel-title"><i class="icon-images"></i> Preview Karyawan</h6>
                    	</div>
                    	<div class="panel-body">
                        <img src="img/karyawan/300_<?php echo $r["gambar"];?>" width="100%" />
                        </div>
                    </div>
                    <!-- /panel with icon --> 
        		</div>   
</div>



	        <!-- Footer -->
	      
	        <!-- /footer -->
