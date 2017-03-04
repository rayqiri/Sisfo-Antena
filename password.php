<script>
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	 $(document).ready(function() {
		
		$("#pwlama").keyup(function(){
    		var pass= $("#pwlama").val();
    		
			$.ajax({
        		url: "getpass.php",
        		data: "id=" + pass,
        		success: function(data){
            	
				$("#npwlama").html(data);
        		}
    		});
  		});
		
		$("#submit").click(function(){
        	var hasError = false;
        	var passwordVal = $("#pwbaru").val();
        	var checkVal = $("#pwbaru2").val();
			
			if (passwordVal =='' || checkVal == '' ) {
            	$("#npwbaru").html('<i class=icon-close></i> Password Baru Belum Diisi');
            	hasError = true;
        	}else if (passwordVal != checkVal ) {
            	$("#npwbaru").html('<i class=icon-close></i> Password Tidak Sama');
            	hasError = true;
        	}else{
				$("#npwbaru").html('<i class=icon-ok></i> Password Sesuai');
            	hasError = false;
			}
			
        	if(hasError == true) {return false;}else{return true;}
  		
		});
		
});

function validateForm() {
    var x = document.getElementById("pw").value;
	if (x == "") {
        window.alert("Maaf, Data / Password Anda tidak Valid");
        return false;
	}
}


</script>
<?php

$q=mysql_query("select * from user where username='$_SESSION[user]'");
$r=mysql_fetch_array($q);
?>
<div class="page-content">
			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Ganti Password<small> Halaman Penggantian Password</small></h3>
				</div>
				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="master.php">Dashboard</a></li>
					<li class="active">Password</li>
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
        		<div class="col-md-8">

            		<!-- Default panel --> 
		            <div class="panel panel-default">
		                <div class="panel-heading">
	                    	<h6 class="panel-title"><i class="icon-pencil3"></i> Form Kamar</h6>
                    	</div>
                    	<div class="panel-body">
                        <form method="post" action="?module=aksi" class="form-horizontal" onsubmit="return validateForm()">
                        
                        <div class="form-group">
							<label class="col-sm-3 control-label">Password Lama</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="pwlama" name="pwlama" placeholder="Password Lama"  required="required" autofocus="autofocus">
                                <div style="margin-top:8px;" id="npwlama"></div>
							</div>
						</div>
                        <div class="form-group">
							<label class="col-sm-3 control-label">Password Baru</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="pwbaru" name="pwbaru" placeholder="Password Baru" required="required">
							</div>
						</div>
                        <div class="form-group">
							<label class="col-sm-3 control-label">Retype Password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="pwbaru2" name="pwbaru2" placeholder="Ketik Ulang Password Baru" required="required">
                                <div style="margin-top:8px;" id="npwbaru"></div>
							</div>
						</div>
                       
                          <div class="form-actions text-right">
                          <button type="button" class="btn btn-default" name="back" onclick="history.go(-1)">Kembali</button>
							<button type="reset" class="btn btn-default" name="reset">Reset</button>
                            <button type="submit" class="btn btn-primary" name="updatepass" id="submit">Simpan Data</button>
						</div>
                        </form>
                        </div>
                        
                    </div>
                    <!-- /default panel --> 
        		</div>
                <div class="col-md-4">

                    <!-- Panel with icon --> 
		            <div class="panel panel-default">
		                <div class="panel-heading">
	                    	<h6 class="panel-title"><i class="icon-bell"></i> Informasi</h6>
                    	</div>
                    	<div class="panel-body">
                        <ul>
                        <li>Password Minimal 8 Karakter</li>
                        </ul>
                        </div>
                    </div>
                    <!-- /panel with icon --> 
        		</div>
</div>



	        <!-- Footer -->
	       
	        <!-- /footer -->


		</div>