      		<div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">E-Com TOB</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-collapse collapse">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="">About</a>
                    </li>
					<li>
                        <a href="#">FAQ</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
				<ul class="nav navbar-nav navbar-collapse collapse navbar-right">
                <li>
                    <a href="dashboard.php">Dashboard</a>
                </li>
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nama']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="config/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->