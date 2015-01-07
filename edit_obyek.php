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
				include "include/sidebar.php";
			?>
			
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Object <small>Tambah Objek</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
							<li class="active">
                                <i class="fa fa-support"></i> Objek
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
			  <div class="col-lg-6">
				<div class="form-group">
                    <label>Nama Objek</label>
                    <input class="form-control" placeholder="Objek Wisata / Hotel">
                </div>
				<div class="form-group">
                    <label>Deskripsi Objek</label>
					<textarea class="form-control" rows="3"></textarea>
                </div>
				<label>Harga Paket</label>
				<div class="form-group input-group">
					<span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control">
                    <span class="input-group-addon">,00</span>
                </div>
				<label>Discount</label>
				<div class="form-group input-group">
					<input type="text" class="form-control">
                    <span class="input-group-addon">%</span>
                </div>
				<div class="form-group">
                    <label>Fasilitas</label>
					<textarea class="form-control" rows="3"></textarea>
                </div>
				<div class="form-group">
                    <label>Lokasi</label>
					<textarea class="form-control" rows="3"></textarea>
                </div>
				<div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control">
                        <option>Wisata</option>
                        <option>Hotel</option>
                    </select>
                </div>
				<div class="form-group">
                    <label>Images input</label>
                    <input type="file">
                </div>
				<div class="form-group">
					<button class="btn btn-success pull-right" type="submit"> Publish </button>
				</div>
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
