<?php
    if (!defined('TEMPLATE')) {
        die('Bạn không có quyền truy cập trang này');
    }

    $maHS = $_GET['id_hs'];
    $sql_view = "SELECT * FROM hocsinh WHERE MaHS = $maHS";
    $query = mysqli_query($conn,$sql_view);
    $row = mysqli_fetch_assoc($query);

    if (isset($_POST['sbm'])) {
        $stu_id = $_POST['stu_id'];
        $class_id = $_POST['class_id'];
        $stu_name = $_POST['stu_name'];
        $stu_sex = $_POST['stu_sex'];
        $stu_birth = $_POST['stu_birth'];
        $stu_place_birth = $_POST['stu_place_birth'];
        $stu_nation = $_POST['stu_nation'];
        $stu_name_dad = $_POST['stu_name_dad'];
        $stu_name_mother = $_POST['stu_name_mother'];

        //Kiểm tra mã học sinh đã bị trùng chưa
        $sql_kt = "SELECT * FROM hocsinh WHERE MaHS = $stu_id";
        $query_kt = mysqli_query($conn,$sql_kt);

        if ($stu_id == $row['MaHS']) {
            $stu_id = $row['MaHS'];

            $sql_update = "UPDATE hocsinh SET MaHS= '$stu_id',MaLopHoc='$class_id',TenHS='$stu_name',GioiTinh='$stu_sex',NgaySinh='$stu_birth',NoiSinh='$stu_place_birth',DanToc='$stu_nation',HoTenCha='$stu_name_dad',HoTenMe='$stu_name_mother' WHERE MaHS = '$maHS'";
            $query_update = mysqli_query($conn,$sql_update);
            header('location: index.php?page=list_stu&id_class='.$class_id.'');
        }elseif(mysqli_num_rows($query_kt) != ""){
            $err = '<div class="alert alert-danger">Mã Học Sinh Đã Bị Trùng !</div>';
        }else{
            $stu_id = $_POST['stu_id'];

            $sql_update = "UPDATE hocsinh SET MaHS= '$stu_id',MaLopHoc='$class_id',TenHS='$stu_name',GioiTinh='$stu_sex',NgaySinh='$stu_birth',NoiSinh='$stu_place_birth',DanToc='$stu_nation',HoTenCha='$stu_name_dad',HoTenMe='$stu_name_mother' WHERE MaHS = '$maHS'";
            $query_update = mysqli_query($conn,$sql_update);
            header('location: index.php?page=list_stu&id_class='.$class_id.'');
        }
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
                            <?php if(isset($err)){echo $err;} ?>
                                <form role="form" method="post">                                   
                                <div class="form-group">
                                    <label>Mã Học Sinh</label>
                                    <input name="stu_id" required type="text" class="form-control" value="<?php echo $row['MaHS'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input name="stu_name" required type="text" class="form-control" value="<?php echo $row['TenHS'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Mã Lớp Học</label>
                                    <select class="form-control" name="class_id">
                                        <?php 
                                            $sql = "SELECT * FROM lophoc";
                                            $query_view = mysqli_query($conn,$sql);
                                            while ($row_view = mysqli_fetch_assoc($query_view)) {
                                        ?>
                                                <option value="<?php echo $row_view['MaLopHoc'] ?>"<?php if($row['MaLopHoc'] == $row_view['MaLopHoc']){echo 'selected';} ?>><?php echo $row_view['Tenlophoc'] ?></option>
                                            <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ngày Sinh</label>
                                    <input name="stu_birth" required type="date" class="form-control" value="<?php echo $row['NgaySinh'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nơi Sinh</label>
                                    <input name="stu_place_birth" required type="text" class="form-control" value="<?php echo $row['NoiSinh'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Giới Tính</label>
                                    <input name="stu_sex" required type="text" class="form-control" value="<?php echo $row['GioiTinh'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Dân Tộc</label>
                                    <input name="stu_nation" required type="text" class="form-control" value="<?php echo $row['DanToc'] ?>">
                                </div> 
                                <div class="form-group">
                                    <label>Họ Tên Cha</label>
                                    <input name="stu_name_dad" required type="text" class="form-control" value="<?php echo $row['HoTenCha'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Họ Tên Mẹ</label>
                                    <input name="stu_name_mother" required type="text" class="form-control" value="<?php echo $row['HoTenMe'] ?>">
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