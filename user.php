<?php 
session_start();
include"config/database.php";
if(!isset($_SESSION['email'])){
    header("location:login.php");
}
$query = mysql_query("SELECT * FROM user ORDER BY id");
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
                                        <th>Email</th>
                                        <th>HP</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php 
										while($data=mysql_fetch_array($query))
										{
									?>
										<tr>
											<td><?php echo $data['nama'];?></td>
											<td><?php echo $data['email'];?></td>
											<td><?php echo $data['hp'];?></td>
											<td><?php if($data['level']==1){ echo"Admin"; } else if($data['level']==2){ echo"Perusahaan"; } else if($data['level']==3){ echo"Pelanggan"; } else{echo"Error";}?></td>
											<td><?php if(($data['level']==2)&&($data['aktif']==0)){ echo"Inactive"; }else{ echo"active"; }?></td>
											<td><a href="user_edit.php?id=<?php echo $data['id'];?>"> Edit </a> | <a href="config/delete_user.php?id=<?php echo $data['id'];?>">Delete</a></td>
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