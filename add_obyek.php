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
	<script language="javascript">
function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function goodchars(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;
 
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();
 
// check goodkeys
if (goods.indexOf(keychar) != -1)
    return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
    
if (key == 13) {
    var i;
    for (i = 0; i < field.form.elements.length; i++)
        if (field == field.form.elements[i])
            break;
    i = (i + 1) % field.form.elements.length;
    field.form.elements[i].focus();
    return false;
    };
// else return false
return false;
}
</script>
	
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
			<form id = "FNilai" role="form" method="post" enctype="multipart/form-data" action="config/add_obyek.php">
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
                    <label>Nama Objek</label>
                    <input name ="nama" class="form-control" placeholder="Objek Wisata / Hotel" required>
                </div>
				<div class="form-group">
                    <label>Deskripsi Objek</label>
					<textarea name ="deskripsi" class="form-control" rows="3" required></textarea>
                </div>
				<label>Harga Paket</label>
				<div class="form-group input-group">
					<span class="input-group-addon">Rp.</span>
                    <input name ="harga" type="text" class="form-control" onKeyPress="return goodchars(event,'0123456789',this)" required>
                    <span class="input-group-addon">,00 / Hari</span>
                </div>
				<label>Discount</label>
				<div class="form-group input-group">
					<input name ="disc" type="text" class="form-control" onKeyPress="return goodchars(event,'.0123456789',this)" >
                    <span class="input-group-addon">%</span>
                </div>
				<div class="form-group">
                    <label>Fasilitas</label>
					<textarea name ="fasilitas" class="form-control" rows="3" required></textarea>
                </div>
				<div class="form-group">
                    <label>Lokasi</label>
					<textarea name ="lokasi" class="form-control" rows="3" required></textarea>
                </div>
				<div class="form-group">
                    <label>Kategori</label>
                    <select name = "kategori" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="Wisata">Wisata</option>
                        <option value="Hotel">Hotel</option>
                    </select>
                </div>
				<div class="form-group">
                    <label>Stok Paket</label>
                    <select name = "stok" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Full">Full</option>
                    </select>
                </div>
				<div class="form-group">
                    <label>Images input</label>
                    <input name = "image_sample" type="file" required>
                </div>
				<div class="form-group col-lg-6">
					<input name="user" type="hidden" id="user" class="form-control" required  value="<?php echo $_SESSION['nama']; ?>"/>  
				</div> 
				<div class="form-group col-lg-6">
					<input name="hp" type="hidden" id="user" class="form-control" required  value="<?php echo $_SESSION['hp']; ?>"/>  
				</div> 	 
				<div class="form-group col-lg-6">
					<input name="hp" type="hidden" id="id_user" class="form-control" required  value="<?php echo $_SESSION['id']; ?>"/>  
				</div>			
				<div class="form-group">
					<button class="btn btn-success pull-right" type="submit"> Publish </button>
				</div>
			  </div>
			</form>
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
