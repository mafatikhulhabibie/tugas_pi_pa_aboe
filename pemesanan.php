<?php 
session_start();
include"config/database.php";
if(!isset($_SESSION['email'])){
    header("location:login.php");
}
$query = mysql_query("SELECT * FROM pemesanan ORDER BY id");
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
                            View <small>Data Pemesanan</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
							<li class="active">
                                <i class="fa fa-support"></i> Data Pemesanan
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Id Pesanan</th>
                                        <th>Nama Paket</th>
                                        <th>Nama Pemesan</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Pembayaran</th>
                                        <th>Pembatalan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php 
										while($data=mysql_fetch_array($query))
										{
									?>
										<tr>
											<td><?php echo $data['id'];?></td>
											<td><?php echo $data['nama_paket'];?></td>
											<td><?php echo $data['nama_user']?></td>
											<td><?php echo $data['check_in'];?></td>
											<td><?php echo $data['check_out']?></td>
											<td><?php echo $data['pembayaran']?></td>
											<td><?php if ($data['status']==0){ echo""; }else {echo"Batal";}?></td>
											<td>Edit |<a href="plugin/order.php?id=<?php echo $data['id'];?>" target="blank"> View </a>| <a href = "config/delete_pemesanan.php?id=<?php echo $data['id'];?>"> Delete</a></td>
										</tr>
									<?php	}
									?>
                                </tbody>
                            </table>
                        </div>
			  
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