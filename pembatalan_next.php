<?php 
session_start();
include"config/database.php";
					$id=$_GET['id'];
					$qrykoreksi=mysql_query("select * from pemesanan where id='$id' LIMIT 1");
					$dataku=mysql_fetch_object($qrykoreksi);

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
                            View <small>Lihat Objek</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
							<li class="active">
                                <i class="fa fa-support"></i> View Object
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<form role="form" method="post" action="config/batal.php">
				<div class="col-lg-6">
					<?php
						$dataku->hasil=(($dataku->harga_paket*$dataku->disc)/100);
						$dataku->hasil2=($dataku->harga_paket-$dataku->hasil);
					?>
					<div class="form-group">
						<input type="hidden" class="form-control" name="id" value="<?php echo $dataku->id?>">
                    </div>
					<div class="form-group">
						<input type="hidden" class="form-control" name="status" value="1">
                    </div>
					<div class="form-group">
						<label>Id Transaksi</label>
						<input type="text" class="form-control" name="id" value="<?php echo $dataku->id?>" disabled>
                    </div>
					<div class="form-group">
						<label>Nama Pemesan</label>
						<input type="text" class="form-control" name="nama_user" value="<?php echo $dataku->nama_user?>" disabled>
                    </div>
					<div class="form-group">
						<label>No Hp Pemesan</label>
						<input type="text" class="form-control" name="hp_user" value="<?php echo $dataku->hp_user?>" disabled>
                    </div>
					<div class="form-group">
						<label>Nama Pesanan</label>
						<input type="text" class="form-control" name="nama_paket" value="<?php echo $dataku->nama_paket?>" disabled>
                    </div>
					<div class="form-group">
						<label>Kategori Pesanan</label>
						<input type="text" class="form-control" name="kategori_paket" value="<?php echo $dataku->kategori_paket?>" disabled>
                    </div>
					<div class="form-group">
						<label>Check In</label>
						<input type="text" class="form-control" name="check_in" value="<?php echo $dataku->check_in?>" disabled>
                    </div>
					<div class="form-group">
						<label>Check Out</label>
						<input type="text" class="form-control" name="check_out" value="<?php echo $dataku->check_out?>" disabled>
                    </div>
					<div class="form-group">
						<label>Tanggal Pesan</label>
						<input type="text" class="form-control" name="tgl_booking" value="<?php echo $dataku->tgl_booking?>" disabled>
                    </div>
					<div class="form-group">
						<label>Jumlah Tagihan</label>
						<input type="text" class="form-control" name="hasil2" value="<?php echo $dataku->hasil2?>" disabled>
                    </div>
                </div>
				<div class="col-lg-6">
					<div class="form-group">
						<img src="ecomtob/<?php echo $dataku->image_paket?>" height="350">
                    </div>
					<?php
						if ($dataku->status==1)
						{
						echo"<h3>Sudah Dibatalkan</h3>";
						}
						else
						{
						echo"
						<div class='row form-actions'>
							<div class='col-sm-12'>
								<button type='submit' class='btn btn-primary pull-right'><i class='icon-user-plus'></i> Batalkan</button>
							</div>
						</div>
						";
				
						}
					?>
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