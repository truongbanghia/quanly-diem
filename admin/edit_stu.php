<?php
    if (!defined('TEMPLATE')) {
        die('Bạn không có quyền truy cập trang này');
    }

    $maHS = $_GET['id_hs'];

    if (isset($_POST['sbm'])) {
        
    }

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="admin.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="admin.php?page=user">Quản lý Lớp Học</a></li>
				<li class="active">Sửa Thông Tin Học Sinh</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sửa Thông Tin Học Sinh</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                            <div class="alert alert-danger">Mã Học Sinh Đã Bị Trùng !</div>
                                <form role="form" method="post">
                                    <?php 
                                        $sql_view = "SELECT * FROM hocsinh WHERE MaHS = $maHS";
                                        $query = mysqli_query($conn,$sql_view);
                                        $row = mysqli_fetch_assoc($query);
                                    ?>
                                <div class="form-group">
                                    <label>Mã Học Sinh</label>
                                    <input name="class_name" required type="text" class="form-control" value="<?php echo $row['MaHS'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input name="class_name" required type="text" class="form-control" value="<?php echo $row['TenHS'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Mã Lớp Học</label>
                                    <input name="class_name" required type="text" class="form-control" value="<?php echo $row['MaLopHoc'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Ngày Sinh</label>
                                    <input name="class_name" required type="text" class="form-control" value="<?php echo $row['NgaySinh'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nơi Sinh</label>
                                    <input name="class_name" required type="text" class="form-control" value="<?php echo $row['NoiSinh'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Giới Tính</label>
                                    <input name="class_name" required type="text" class="form-control" value="<?php echo $row['GioiTinh'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Dân Tộc</label>
                                    <input name="class_name" required type="text" class="form-control" value="<?php echo $row['DanToc'] ?>">
                                </div> 
                                <div class="form-group">
                                    <label>Họ Tên Cha</label>
                                    <input name="class_name" required type="text" class="form-control" value="<?php echo $row['HoTenCha'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Họ Tên Mẹ</label>
                                    <input name="class_name" required type="text" class="form-control" value="<?php echo $row['HoTenMe'] ?>">
                                </div>                            
                                
                                <button name="sbm" type="submit" class="btn btn-success">Chấp Nhận</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	