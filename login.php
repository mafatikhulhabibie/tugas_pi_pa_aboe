<?php 
session_start();
if(isset($_SESSION['email'])){
    
    header("location:index.php");
}
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
			include "include/menus_front.php";
		?>     
    </nav>

    <!-- Page Content -->
    <div class="container">

	<div class="login-box">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
			<div class="panel-heading"><span class="text-semibold"> Login Akun </span></div>
              <form role="form" method="post" action="config/login.php">
				<div class="panel-body">
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
							
                    <div class="form-group">
						<label>Alamat Email</label>
						<input type="text" class="form-control" name="email" placeholder="Alamat Email" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="pass" placeholder="Password Anda" required>
					</div>
                    <div class="row form-actions">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-primary pull-right"><i class="icon-user-plus"></i> Daftar</button>
						</div>
					</div>
                </div>
			  </form>
            </div>
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

    <!-- jQuery -->
	<script src="asset/front/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
	<script src="asset/front/js/bootstrap.min.js"></script>

</body>

</html>