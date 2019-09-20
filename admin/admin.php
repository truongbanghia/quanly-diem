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
		<title>THCS Việt Hưng - Administrator</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/datepicker3.css" rel="stylesheet">
		<link href="css/bootstrap-table.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">

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
								</svg><?php echo $_SESSION['mail_user'] ?><span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#"><svg class="glyph stroked male-user">
											<use xlink:href="#stroked-male-user"></use>
										</svg> Hồ sơ</a></li>
								<li><a href="logout.php"><svg class="glyph stroked cancel">
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
						</svg> Dashboard</a></li>
				<li><a href="index.php?page=user"><svg class="glyph stroked male user ">
							<use xlink:href="#stroked-male-user" /></svg>Quản lý Nhân Viên</a></li>
				<li><a href="index.php?page=teacher"><svg class="glyph stroked male user ">
							<use xlink:href="#stroked-male-user" /></svg>Quản lý Giáo Viên</a></li>
				<li><a href="index.php?page=assigned"><svg class="glyph stroked male user ">
                            <use xlink:href="#stroked-app-window-with-content" /></svg>Phân Công Giảng Dạy</a></li>
                <li><a href="index.php?page=class"><svg class="glyph stroked male user ">
                            <use xlink:href="#stroked-male-user" /></svg>Quản lý Học Sinh</a></li>
				<li><a href="index.php?page=diem"><svg class="glyph stroked open folder">
							<use xlink:href="#stroked-open-folder" /></svg>Quản lý Điểm</a></li>
				<li><a href="#"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Thống Kê - Báo Cáo</a></li>
				
			</ul>

		</div>
		<!--/.sidebar-->

		<!-- //Master page -->
        <?php
			if (isset($_GET['page'])) {
				
				switch ($_GET['page']) {
					case 'user':
						include_once('user.php');
						break;
					case 'add_user':
						include_once('add_user.php');
						break;
					case 'edit_user':
						include_once('edit_user.php');
						break;
					case'class':
						include_once('class.php');
						break;
					case 'add_class':
						include_once('add_class.php');
						break;
					case 'list_stu':
						include_once('list_stu.php');
						break;
					case 'add_stu':
						include_once('add_stu.php');
						break;
					case 'edit_class':
						include_once('edit_class.php');
						break;
					case 'edit_stu':
						include_once('edit_stu.php');
						break;
					case 'diem':
						include_once('diem.php');
						break;
					case 'list_diem':
						include_once('list_diem.php');
						break;
					case 'edit_diem':
						include_once('edit_diem.php');
						break;
					case 'teacher':
						include_once('teacher.php');
						break;
					case 'add_teacher':
						include_once('add_teacher.php');
						break;
					case 'edit_teacher':
						include_once('edit_teacher.php');
						break;
					case 'assigned':
						include_once('assigned.php');
						break;
					case 'list_mon':
						include_once('list_mon.php');
						break;
					case 'add_mon':
						include_once('add_mon.php');
						break;
					case 'edit_mon':
						include_once('edit_mon.php');
						break;
					case 'add_mon_gv':
						include_once('add_mon_gv.php');
						break;
					default:
						include_once('statistic.php');
						break;
				}
				
			}else {
				include_once('statistic.php');
			}
        
        ?>


		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-table.js"></script>	
	</body>

</html>
