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

                <div class="thumbnail2">
                    <img class="img-responsive" src="ecomtob/<?php echo $dataku->image_sample?>" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right">Rp. <?php echo $dataku->harga?> / Hari</h4>
                        <h4><a href="#"><?php echo $dataku->nama?></a>
                        </h4>
                        <p>Lokasi : <?php echo $dataku->lokasi?>.</p>
                        <p><?php echo $dataku->deskripsi?></p>
						<strong>Fasilitas : <?php echo $dataku->fasilitas?></strong>
                    </div>
					<p>
                    <div class="ratings">
                        <p class="pull-right">Discount <?php echo $dataku->disc?>%</p>
                        <p>
                            <?php echo $dataku->user?> / <?php echo $dataku->hp?>
                        </p>
                    </div>
                </div>

                <div class="well">
					
		<?php
		if(isset($_SESSION['email'])){
			echo"<div class='text-right'> (Harga Diatas Belum Termasuk Discount)
			<a class = 'btn btn-success 'href = 'form_order.php?id=$dataku->id'>Order</a>
			</div>";
		}
		else{
			echo "Anda Harus Login Dahulu Untuk Order    (Harga Di Atas Belum Termasuk Discount)";
		}
		?>           

                    <hr>
                </div>

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
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <?php
		include "include/js_front.php";
	?> 

</body>

</html>
