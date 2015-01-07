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
			<div class="panel-heading"><span class="text-semibold"> Registrasi Akun </span></div>
              <form id = "FNilai" role="form" method="post" action="config/register.php">
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
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group">
						<label>Alamat Email</label>
						<input type="text" class="form-control" name="email" placeholder="Alamat Email" required>
					</div>
                    <div class="form-group">
						<label>Alamat Domisili</label>
						<input type="text" class="form-control" name="alamat" placeholder="Alamat Domisili" required>
					</div>
                    <div class="form-group">
						<label>Nomor Telp</label>
						<input type="text" class="form-control" name="hp" placeholder="Nomor Telp" onKeyPress="return goodchars(event,'+0123456789',this)" required>
					</div>
					<div class="form-group">
						<label>Daftar Sebagai</label>
						<select name="level" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option value="2">Perusahaan</option>
                            <option value="3">Pelanggan</option>
                        </select>
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