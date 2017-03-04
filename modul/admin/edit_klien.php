
<?php
$id = isset($_GET['id']) ? $_GET['id'] : "";
$q=mysql_query("select * from klien where id_klien='$id'");
$r=mysql_fetch_array($q);
?>
<div class="page-content">
			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Tambah & Edit Klien<small> Silahkan lengkapi formulir berikut untuk menambahkan / Memperbaharui Data Klien</small></h3>
				</div>
				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?p=dashboard">Dashboard</a></li>
                
					<li class="active">Tambah & Edit  Klien</li>
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
	                    	<h6 class="panel-title"><i class="icon-pencil3"></i> Form Klien</h6>
                    	</div>
                    	<div class="panel-body">
                        <form method="post" action="?module=aksi_klien" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $r["id_klien"];?>" name="kd" />
                        <div class="form-group">
							<label class="col-sm-3 control-label">Nama Klien: </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $r["nama"];?>" required="required" autofocus="autofocus">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Jenis Kelamin: </label>
							<div class="col-sm-9">
        
                                <select name="jekel" class="form-control" required>
                                     <option value="">Pilih : </option>
										<option value="laki-laki" <?php if($r["jekel"]=="laki-laki"){echo "selected";}; ?>>Laki-laki</option>
                                        <option value="perempuan" <?php if($r["jekel"]=="perempuan"){echo "selected";}; ?>>Perempuan</option>
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
        
                                <select name="kecamatan" class="form-control" required>
                                     <option value="">Pilih Kecamatan : </option>
                                        <?php
                                        $sql=mysql_query("SELECT * FROM kecamatan");
                                        while($ada=mysql_fetch_array($sql)){
                                        ?>
                                        <option value="<?php echo $ada['id_kecamatan'];?>" <?php if($r['id_kecamatan']==$ada['id_kecamatan']){echo"selected";}?>><?php echo $ada['kecamatan'];?></option>

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
							<label class="col-sm-3 control-label">Paket: </label>
							<div class="col-sm-9">
        
                               <input name="paket" type="text" class="form-control" id="kontak" placeholder="Paket Internet" value="<?php echo $r["jenis_paket"];?>">

                               
							</div>
						</div>
                       <div class="form-group">
							<label class="col-sm-3 control-label">Ip Address :</label>
							<div class="col-sm-9">
								<input name="ipaddress" type="text" class="form-control" id="kontak" placeholder="Ip Address" value="<?php echo $r["ip_address"];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Mac Address: </label>
							<div class="col-sm-9">
								<input name="mac" type="text" class="form-control" id="kontak" placeholder="Mac Address" value="<?php echo $r["mac_address"];?>">
							</div>
						</div>
                        
                       
                        
                        <div class="form-group">
							<label class="col-sm-3 control-label">Foto Lokasi: </label>
							<div class="col-sm-9">
								<input type="file"  name="gambar">
							</div>
						</div>
                        <div class="form-group">
							<label class="col-sm-3 control-label">Latitude: </label>
							<div class="col-sm-9">
								<input name="lat" type="text" required="required" class="form-control" id="lat" placeholder="Latitude (Geser Map)" value="<?php echo $r["lat"];?>">
							</div>
						</div>
                        <div class="form-group">
							<label class="col-sm-3 control-label">Longitude: </label>
							<div class="col-sm-9">
								<input name="lng" type="text" required="required" class="form-control" id="lng" placeholder="Longitude (Geser Map)" value="<?php echo $r["lng"];?>">
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
	                    	<h6 class="panel-title"><i class="icon-map"></i> Peta</h6>
                    	</div>
                    	<div class="panel-body">
                        <div id="map" style="width:100%; height:300px;"></div>
                        </div>
                    </div>
                    <!-- /panel with icon --> 
        		</div>
				 <?php if(!empty($id)){?>
        		<div class="col-md-5">

                    <!-- Panel with icon --> 
		            <div class="panel panel-default">
		                <div class="panel-heading">
	                    	<h6 class="panel-title"><i class="icon-images"></i> Preview Klien</h6>
                    	</div>
                    	<div class="panel-body">
                        <img src="img/klien/300_<?php echo $r["gambar"];?>" width="100%" />
                        </div>
                    </div>
                    <!-- /panel with icon --> 
        		</div>
                <?php } ?>
               
</div>



	        <!-- Footer -->
	      
	        <!-- /footer -->
<?php
if(!empty($id)){
	$lat=$r["lat"];
	$lng=$r["lng"];
}else{
	$lat=-6.8081487247897;
	$lng=110.84135647082519;
}
?>

		</div>
        <script>
        function updateMarkerPosition(latLng) {
		document.getElementById('lat').value = [latLng.lat()];
		document.getElementById('lng').value = [latLng.lng()];
	}

 
	
    var myOptions = {
      zoom: 12,
        scaleControl: true,
      center:  new google.maps.LatLng(<?php echo $lat;?>, <?php echo $lng;?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

	
    var map = new google.maps.Map(document.getElementById("map"),
        myOptions);

	var marker1 = new google.maps.Marker({
	position : new google.maps.LatLng(<?php echo $lat;?>, <?php echo $lng;?>9),
	title : 'lokasi',
	map : map,
	draggable : true
	});
	
	//updateMarkerPosition(latLng);

	google.maps.event.addListener(marker1, 'drag', function() {
		updateMarkerPosition(marker1.getPosition());
	});
	

	

	
        
        </script>