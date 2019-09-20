<?php 
	if (!defined('TEMPLATE')) {
		die('bạn không có quyền truy cập trang này!');
    }
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Trang chủ quản trị</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Trang chủ quản trị</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-6">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked female-user"><use xlink:href="#stroked-female-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<?php
								$query_hocsinh = mysqli_query($conn,"SELECT * FROM hocsinh");
							?>
							<div class="large"><?php echo mysqli_num_rows($query_hocsinh); ?></div>
							<div class="text-muted">Học Sinh</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-6">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked fale-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<?php
								$query_giaovien = mysqli_query($conn,"SELECT * FROM giaovien");
							?>
							<div class="large"><?php echo mysqli_num_rows($query_giaovien); ?></div>
							<div class="text-muted">Giáo Viên</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-xs-12 col-md-4 col-lg-4">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">150</div>
							<div class="text-muted">Học Sinh Giỏi</div>
						</div>						
					</div>
				</div>
			</div>
			
			<div class="col-xs-12 col-md-4 col-lg-4">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">200</div>
							<div class="text-muted">Học Sinh Tiên Tiến</div>
						</div>						
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-4 col-lg-4">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">50</div>
							<div class="text-muted">Học Sinh Trung Bình</div>
						</div>						
					</div>
				</div>
			</div>
			
		</div><!--/.row-->
	</div>	<!--/.main-->