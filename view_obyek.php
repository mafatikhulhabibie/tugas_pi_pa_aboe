<?php 
session_start();
include"config/database.php";
if(!isset($_SESSION['email'])){
    header("location:login.php");
}
$query = mysql_query("SELECT * FROM paket ORDER BY id");
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
				<div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Lokasi</th>
                                        <th>Discount</th>
                                        <th>Harga</th>
                                        <th>Ketersediaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php 
										while($data=mysql_fetch_array($query))
										{
									?>
										<?php
										$data ['hasil'] = ($data ['harga']*$data ['disc'])/100;
										$data ['hasil2'] = $data ['harga']-$data ['hasil'];
										?>
										<tr>
											<td><?php echo $data['nama'];?></td>
											<td><?php echo $data['lokasi'];?></td>
											<td><?php echo $data['disc']?></td>
											<td><?php echo $data['harga'];?>/<?php echo $data['hasil2'];?></td>
											<td><?php echo $data['stok']?></td>
											<td>Edit | <a href="config/delete_obyek.php?id=<?php echo $data['id'];?>" >Delete</a></td>
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