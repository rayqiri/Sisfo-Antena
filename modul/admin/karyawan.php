<?php
$k=mysql_query("SELECT MAX((RIGHT(id_karyawan,3))) AS n FROM karyawan");
	$t=mysql_fetch_array($k);
	$n=$t['n']+1;

	$len = strlen($n);
	if($len==1) $nol="00";
	else if($len==2) $nol="0";
	$nomor ="KRL".$nol.$n;
?>
<div class="page-content">
			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Tambah Karyawan<small> Silahkan lengkapi formulir berikut untuk menambahkan Data Karyawan</small></h3>
				</div>
				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?p=dashboard">Dashboard</a></li>
                
					<li class="active">Tambah Karyawan</li>
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
                        <input type="hidden" value="<?php echo $nomor;?>" name="kd" />
                        <div class="form-group">
							<label class="col-sm-3 control-label">Nama Karyawan: </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="nama" placeholder="Nama Karyawan" required="required" autofocus="autofocus">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Jenis Kelamin: </label>
							<div class="col-sm-9">
        
                                <select name="jekel" class="form-control" required>
                                     <option value="">Pilih : </option>
										<option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                </select>

                               
							</div>
						</div>
						
						
                        <div class="form-group">
							<label class="col-sm-3 control-label">Alamat: </label>
							<div class="col-sm-9">
								<input name="alamat" type="text" required="required" class="form-control" id="alamat" placeholder="Alamat">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Kecamatan: </label>
							<div class="col-sm-9">
        
                                <select name="kecamatan" class="form-control" required>
                                     <option value="">Pilih Kecamatan : </option>
                                        <?php
                                        $sql=mysql_query("SELECT * FROM kecamatan");
                                        while($ada=mysql_fetch_array($sql)){
                                        ?>
                                        <option value="<?php echo $ada['id_kecamatan'];?>"><?php echo $ada['kecamatan'];?></option>

                                        <?php
                                    }
                                        ?>
                                </select>

                               
							</div>
						</div>
                        <div class="form-group">
							<label class="col-sm-3 control-label">No Telp: </label>
							<div class="col-sm-9">
								<input name="telp" type="text" required="required" class="form-control" id="kontak" placeholder="No Telp">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Email: </label>
							<div class="col-sm-9">
								<input name="email" type="text" required="required" class="form-control" id="kontak" placeholder="E-Mail">
							</div>
						</div>
						 
                        <div class="form-group">
							<label class="col-sm-3 control-label">Username: </label>
							<div class="col-sm-9">
								<input name="username" type="text" required="required" class="form-control" id="username" placeholder="Username" >
							</div>
						</div>
                         
                        <div class="form-group">
							<label class="col-sm-3 control-label">Password: </label>
							<div class="col-sm-9">
								<input name="password" type="password" required="required" class="form-control" id="password" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Status: </label>
							<div class="col-sm-9">
        
                                <select name="status" class="form-control" required>
                                     <option value="">Pilih : </option>
										<option value="Aktif">Aktif</option>
                                        <option value="Non Aktif">Non Aktif</option>
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
                            <button type="submit" class="btn btn-primary" name="add">Simpan Data</button>
						</div>
                        </form>
                        </div>
                        
                    </div>
                    <!-- /default panel --> 
        		</div>

               
</div>



	        <!-- Footer -->
	      
	        <!-- /footer -->
