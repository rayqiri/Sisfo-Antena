
<?php
$id = isset($_GET['id']) ? $_GET['id'] : "";
$q=mysql_query("select * from masalah where id_masalah='$id'");
$r=mysql_fetch_array($q);
?>
<style>
.frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
#klien-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
#klien-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#klien-list li:hover{background:#F0F0F0;}
#search-box{padding: 10px;border: #F0F0F0 1px solid;}
#search-box2{padding: 10px;border: #F0F0F0 1px solid;}
</style>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "ajax_klien.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});

function selectKlien(val) {
var a = val.split("#",2);

$("#search-box").val(a[0]);
$("#search-box2").val(a[1]);
$("#suggesstion-box").hide();
}
</script>
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
	                    	<h6 class="panel-title"><i class="icon-pencil3"></i> Form Kirim Pesan</h6>
                    	</div>
                    	<div class="panel-body">
                        <form method="post" action="?module=aksi_pesan" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
							<label class="col-sm-3 control-label">Pesan: </label>
							<div class="col-sm-9">
								<textarea name="pesan" required="required" class="form-control" col="4" rows="7"></textarea>
							</div>
						</div>
                        
                       
                        
                       
                        
                        
                          <div class="form-actions text-right">
                          <button type="button" class="btn btn-default" name="back" onclick="history.go(-1)">Kembali</button>
							<button type="reset" class="btn btn-default" name="reset">Reset</button>
                            <button type="submit" class="btn btn-primary" name="add">Kirim Pesan</button>
						</div>
                        </form>
                        </div>
                        
                    </div>
                    <!-- /default panel --> 
        		</div>
               
</div>



	        <!-- Footer -->
	      
	        <!-- /footer -->