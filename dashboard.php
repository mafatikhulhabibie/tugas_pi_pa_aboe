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
			if(($_SESSION['level']==2)&&($_SESSION['aktif']==0)){
			include "include/sidebar_inactive.php";
			}
			else{
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
                            Dashboard <small>E-Com TOB</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
				<?php if(($_SESSION['level']==2)&&($_SESSION['aktif']==0)){?>
			        <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Akun Anda Belum Aktif, Silahkan menghubungi Admin</strong>
                        </div>
                    </div>
				<?php } else{?>
				<div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Selamat Datang Di Halaman Dashboard E-Com TOB</strong>
                        </div>
                    </div>
				<?php }?>
                </div>
                <!-- /.row -->
			</div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	<?php
		include "include/footer.php";
	?> 
</body>

</html>
