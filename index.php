<?php 
session_start();
include"config/database.php";
	$query=mysql_query("select * from paket order by id desc LIMIT 8");

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

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="images/bali1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/bali2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/bali3.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
			
                <div class="row">
							<?php
								while($row=mysql_fetch_array($query)){
							?>
							
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="ecomtob/<?php echo $row['image_sample'];?>" alt="">
                            <div class="caption">
                                <h4 class="pull-right">Rp. <?php echo $row['harga'];?></h4>
                                <h4><a href="item.php?id=<?php echo $row['id'];?>"><?php echo $row['nama'];?></a>
                                </h4>
                                <p><?php echo $row['deskripsi'];?>.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><?php echo $row['disc'];?>%</p>
                                <p>
                                    <span class="">Discount</span>
                                    
                                </p>
                            </div>
                        </div>
                    </div>
				<?php
				}
				?>
                    
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