<?php 
	if (!defined('TEMPLATE')) {
		die('bạn không có quyền truy cập trang này!');
	}

	$query_thongke = mysqli_query($conn,"SELECT * FROM thongke");
	$hs_gioi = 0;
	$hs_kha = 0;
	$hs_tb = 0;
	while ($row_tk = mysqli_fetch_assoc($query_thongke)) {
		if ($row_tk['TbNamHoc'] >= 8.0 && $row_tk['TbNamHoc'] <= 10.0) {
			$hs_gioi++;
		}elseif ($row_tk['TbNamHoc'] >= 6.5 && $row_tk['TbNamHoc'] <= 7.9) {
			$hs_kha++;
		}else{
			$hs_tb++;
		}
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
				<h1 class="page-header">Thống kê - Báo Cáo</h1>
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
							<div class="large"><?php echo $tong_hs = mysqli_num_rows($query_hocsinh); ?></div>
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
			<div class="col-xs-12 col-md-12 col-lg-12">
				<h2>Toàn trường: </h2>
			</div>
			<div class="col-xs-12 col-md-4 col-lg-4">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $hs_gioi.' Chiếm '.($hs_gioi/$tong_hs)*100 .'%'; ?></div>
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
							<div class="large"><?php echo $hs_kha.' Chiếm '.($hs_kha/$tong_hs)*100 .'%'; ?></div>
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
							<div class="large"><?php echo $hs_tb.' Chiếm '.($hs_tb/$tong_hs)*100 .'%'; ?></div>
							<div class="text-muted">Học Sinh Trung Bình</div>
						</div>						
					</div>
				</div>
			</div>
			
		</div><!--/.row-->
	</div>	<!--/.main-->