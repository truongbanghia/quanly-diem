<?php
	if (!defined('TEMPLATE')) {
		die('bạn không có quyền truy cập trang này!');
    }
    
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>THCS Việt Hưng - Teacher</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="../admin/css/datepicker3.css" rel="stylesheet">
		<link href="../admin/css/bootstrap-table.css" rel="stylesheet">
		<link href="../admin/css/styles.css" rel="stylesheet">

		<!--Icons-->
		<script src="js/lumino.glyphs.js"></script>

		<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

	</head>

	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
						data-target="#sidebar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><span>VIỆT HƯNG</span> Secondary School</a>
					<ul class="user-menu">
						<li class="dropdown pull-right">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg
									class="glyph stroked male-user">
									<use xlink:href="#stroked-male-user"></use>
								</svg> <?php echo $_SESSION['mail_gv']; ?> <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#"><svg class="glyph stroked male-user">
											<use xlink:href="#stroked-male-user"></use>
										</svg> Hồ sơ</a></li>
								<li><a href="../admin/logout.php"><svg class="glyph stroked cancel">
											<use xlink:href="#stroked-cancel"></use>
										</svg> Đăng xuất</a></li>
							</ul>
						</li>
					</ul>
				</div>

			</div><!-- /.container-fluid -->
		</nav>

		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
			<form role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
			</form>
			<ul class="nav menu">
				<li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial">
							<use xlink:href="#stroked-dashboard-dial"></use>
						</svg> Thông Tin Cá Nhân</a></li>
                <li><a href="index.php?page_gv=points"><svg class="glyph stroked male user ">
                            <use xlink:href="#stroked-male-user" /></svg>Quản Lí Điểm Học Sinh</a></li>
				
				
			</ul>

		</div>
		<!--/.sidebar-->

		<!-- //Master page -->
        <?php
        if (isset($_GET['page_gv'])) {
            switch ($_GET['page_gv']) {
                case 'add_points':
                    include_once('add_points.php');
                    break;
                
                case 'points':
                    include_once('points.php');
					break;
					
				default:
					include_once('personal.php');
					break;
            }
        }else{
            include_once('personal.php');
        }			
           
        ?>


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-table.js"></script>
	
	</body>

</html>
