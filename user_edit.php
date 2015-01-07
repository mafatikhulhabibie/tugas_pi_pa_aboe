<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("location:login.php");
}
include"config/database.php";
		$id=$_GET['id'];
		$qrykoreksi=mysql_query("select * from user where id='$id' LIMIT 1");
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
			<div class="page-content row">
			<!-- Page header -->
				<div class="page-header">
					<h1 class="page-header">
                            Profil <small><?php if ($_SESSION['level']==1){ echo "Admin";} else if ($_SESSION['level']==2){ echo "User Perusahaan";} else if ($_SESSION['level']==3){ echo "Pelanggan";} else { echo "Error";}?></small>
                    </h1>

					<ol class="breadcrumb">
					<li>
                        <i class="fa fa-dashboard"></i> Dashboard
                    </li>
					<li class="active">
                        <i class="fa fa-user"></i> Edit Profil
                    </li>
					</ol>
				
				</div>  
		
				<div class="page-content-wrapper">	
					<ul class="nav nav-tabs" >
						<li class="active"><a href="#data" data-toggle="tab"> Data User </a></li>
						<li><a href="#pass" data-toggle="tab">Ganti Password </a></li>
					</ul>	
	
					<div class="tab-content">
						<div class="tab-pane active" id="data">
						<form role="form" method="post" action="config/edit_profil.php">
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
							<div class="form-group">
								<input name="id" type="hidden" id="id" class="form-control" required  value="<?php echo $dataku->id?>" />  
							</div>
							<div class="form-group">
								<label> Nama Lengkap </label>
								<input name="nama" type="text" id="nama" class="form-control" required  value="<?php echo $dataku->nama?>" />  
							</div>  
		  
							<div class="form-group">
								<label>Alamat Email </label>
								<input name="email" type="text" id="email"  class="form-control" required value="<?php echo $dataku->email?>" /> 
							</div> 	  
	  
							<div class="form-group">
								<label>Alamat Domisili </label>
								<input name="alamat" type="text" id="alamat" class="form-control" required value="<?php echo $dataku->alamat?>" /> 
							</div>  
		  
							<div class="form-group">
								<label>No Telp / HP </label>
								<input name="hp" type="text" id="hp" class="form-control" required value="<?php echo $dataku->hp?>" />  
							</div>
							<div class="form-group">
								<label>Daftar Sebagai</label>
								<select name="aktif" class="form-control" <?php if($dataku->level!=2){echo"disabled";}?>>
									<option value=""><?php if(($dataku->aktif==0)&&($dataku->level==2)){echo "Inactive";}else{echo"Active";}?></option>
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
							</div>
							<div class="form-group">
									<button class="btn btn-success pull-right" type="submit"> Update Profil</button>
							</div> 	
						  </div>
						</form>
						</div>
  
						<div class="tab-pane  m-t" id="pass">
						<form role="form" method="post" action="config/update_password.php">
						  <div class="col-lg-6">
							<div class="form-group">
								<input name="id" type="hidden" id="id" class="form-control" required  value="<?php echo $dataku->id?>" />  
							</div>
							<div class="form-group">
								<label> Password Baru  </label>
									<input name="pass" type="password" class="form-control"/>  
							</div>    
		 
							<div class="form-group">
									<button class="btn btn-danger" type="submit"> Ganti Password </button>
							</div>
						  </div>
						</form>
						</div>
					</div>
				</div>
			</div>	
        </div>  
    </div>
	</div>
    <!-- /#wrapper -->
	<?php
		include "include/footer.php";
	?> 
</body>

</html>
