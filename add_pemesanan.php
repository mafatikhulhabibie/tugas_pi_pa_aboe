<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("location:login.php");
}
include"config/database.php";
	$query=mysql_query("select * from user order by id");
	$query2=mysql_query("select * from paket order by id");
	$query3=mysql_query("select * from paket order by id");

?>

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<?php
		include "include/header.php";
	?>
	
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
			<?php
				include "include/menu.php";
			?>
			
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
			<?php
				if($_SESSION['level']==1){
				include "include/sidebar.php";
				}
				else if($_SESSION['level']==2){
				include "include/sidebar_perusahaan.php";
				}
				else if($_SESSION['level']==3){
				include "include/sidebar_pelanggan.php";
				}
				else{
				echo"error";
				}
				
			?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add <small>Tambah Pesanan</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
							<li class="active">
                                <i class="fa fa-support"></i> Pesan
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
			<form role="form" method="post" action="config/order2.php">
				<div class="col-lg-6">
		
					<div class="form-group">
						<label>Nama User</label>
						<select name = "nama_user" class="form-control" required>
						<?php
							while($row=mysql_fetch_array($query)){
						?>
							<option><?php echo $row['nama'];?></option>
						<?php
						}
						?>
						</select>
					</div>
					<div class="form-group">
						<label>Nomor Telp. / HP</label>
						<input name ="hp_user" class="form-control" placeholder="Nomor Telp / HP" required>
					</div>
					
					<div class="form-group">
						<label>Nama Paket / Harga</label>
						<select name = "nama_paket" class="form-control" required>
						<?php
							while($row=mysql_fetch_array($query2)){
						?>
						<?php
							$row ['hasil'] = ($row ['harga']*$row ['disc'])/100;
							$row ['hasil2'] = $row ['harga']-$row ['hasil'];
						?>
							<option><?php echo $row['nama'];?> / <?php echo $row['hasil2'];?></option>
						<?php
						}
						?>
						</select> Harga sudah termasuk diskon
					</div>
					<div class="form-group">
						<label>Kategori Paket</label>
						<select name = "kategori_paket" class="form-control" required>
							<option>Wisata</option>
							<option>Hotel</option>
						</select>
					</div>
					
					<div class="form-group">
					<label>Tanggal Check In</label>
					<div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="" data-link-format="yyyy-mm-dd">
						<input class="form-control" size="10" type="text" name="check_in">
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
					</div>
					
					<div class="form-group">
					<label>Tanggal Check Out</label>
					<div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="" data-link-format="yyyy-mm-dd">
						<input class="form-control" size="10" type="text" name="check_out">
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
					</div>
					
					<div class="form-group">
						<label>Pembayaran Rp.</label>
						<input name ="pembayaran" class="form-control" placeholder="Pembayaran Secara Langsung" required>
					</div>						
					<div class="row form-actions">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-primary pull-right"><i class="icon-user-plus"></i> Order Now</button>
						</div>
					</div>				
				</div>
			</form>	
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	<?php
		include "include/footer.php";
	?> 
</body>

</html>