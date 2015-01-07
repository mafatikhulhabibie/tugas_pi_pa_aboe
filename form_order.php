<?php 
session_start();
include"config/database.php";
					$id=$_GET['id'];
					$qrykoreksi=mysql_query("select * from paket where id='$id' LIMIT 1");
					$dataku=mysql_fetch_object($qrykoreksi);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  
	<?php
		include "include/header_front.php";
	?>   

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">		
		<?php
		if(isset($_SESSION['email'])){
			include "include/menus_front2.php";
		}
		else{
			include "include/menus_front.php";
		}
		?>     
    </nav>

    <!-- Page Content -->
    <div class="container">
    	
		<div class="row">

            <div class="col-md-9">
			<h3>Kelengkapan Pemesanan</h3>
			<hr>
			<form role="form" method="post" action="config/order.php">
				<div class="col-md-8">
					<div class="form-group">
					<label>Tanggal Check In</label>
					<div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="" data-link-format="yyyy-mm-dd">
						<input class="form-control" size="10" type="text" name="check_in" required>
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
					</div>
					<div class="form-group">
					<label>Tanggal Check Out</label>
					<div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="" data-link-format="yyyy-mm-dd">
						<input class="form-control" size="10" type="text" name="check_out" required>
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
					</div>
				<div class="form-group">
					<input name="id_user" type="hidden" class="form-control" required  value="<?php echo $_SESSION['id']; ?>"/>  
				</div>
				<div class="form-group">
					<input name="nama_user" type="hidden"class="form-control" required  value="<?php echo $_SESSION['nama']; ?>"/>  
				</div>			
				<div class="form-group">
					<input name="hp_user" type="hidden" class="form-control" required  value="<?php echo $_SESSION['hp']; ?>"/>  
				</div>
				<div class="form-group">
					<input name="id_paket" type="hidden" class="form-control" required  value="<?php echo $dataku->id?>"/>  
				</div>	
				<div class="form-group">
					<input name="nama_paket" type="hidden" class="form-control" required  value="<?php echo $dataku->nama?>"/>  
				</div>		
				<div class="form-group">
					<input name="harga_paket" type="hidden" class="form-control" required  value="<?php echo $dataku->harga?>"/>  
				</div>		
				<div class="form-group">
					<input name="disc" type="hidden" class="form-control" required  value="<?php echo $dataku->disc?>"/>  
				</div>		
				<div class="form-group">
					<input name="image_paket" type="hidden" class="form-control" required  value="<?php echo $dataku->image_sample?>"/>  
				</div>
				<div class="form-group">
					<input name="kategori_paket" type="hidden" class="form-control" required  value="<?php echo $dataku->kategori?>"/>  
				</div>					
					<div class="row form-actions">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-primary pull-right"><i class="icon-user-plus"></i> Order Now</button>
						</div>
					</div>				
				</div>
			</form>	
			</div>
			
			<div class="col-md-3">
			
			<?php
				include "include/sidebar_front.php";
			?> 	
            
			</div>

        </div>
	
	</div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
			<?php
				include "include/footer_front.php";
			?> 
		</footer>

    </div>
    <!-- /.container -->
			<?php
				include "include/js_front.php";
			?> 
    <!-- jQuery -->

</body>

</html>