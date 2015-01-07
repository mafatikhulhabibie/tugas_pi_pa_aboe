<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("location:login.php");
}

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
                            Konfirmasi <small>Pembatalan</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
							<li class="active">
                                <i class="fa fa-file"></i> Komfirmasi Pembatalan
                            </li>
                        </ol>
                    </div>
					<form role="form" method="post" action="config/search_batal.php">
					<div class="col-lg-6">
					<?php
						// menampilkan validasi jika username atau password salah
							if(isset($_SESSION['error']))
							{
								echo $_SESSION['error'];
								unset($_SESSION['error']);
							}
							else{
								// apabila login gagal lanjut tampilkan form login
								}
                    ?>
						<h1 class="page-header">
                            Masukkan Id Transaksi Anda
                        </h1>
						<div class="form-group">
							<input name="id" type="text" id="id" class="form-control" required placeholder="Masukkan Id Transaksi Anda"/>  
						</div>
                        
						<div class="form-group">
							<button class="btn btn-success pull-right" type="submit"> Cek </button>
						</div>
                    </div>
					</form>
                </div>
                <!-- /.row -->

                
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
