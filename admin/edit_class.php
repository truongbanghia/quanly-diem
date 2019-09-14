<?php
    if (!defined('TEMPLATE')) {
        die('Bạn không có quyền truy cập trang này');
    }

    $id_class = $_GET['id_class'];
    $query = mysqli_query($conn,"SELECT * FROM lophoc WHERE MaLopHoc = $id_class");
    $row = mysqli_fetch_assoc($query);
    
    if (isset($_POST['sbm'])) {
        $class_id = $_POST['class_id'];
        $class_level = $_POST['class_level'];
        if ($_POST['class_name'] == $row['Tenlophoc']) {
            $class_name = $_POST['class_name'];
        }else {
            $class_name = $_POST['class_name'];
            $query2 = mysqli_query($conn,"SELECT * FROM lophoc WHERE Tenlophoc = '$class_name'");
            if (mysqli_num_rows($query2) != "") {
                $err = '<div class="alert alert-danger">Tên lớp học đã bị trùng!</div>';
            }else{
                $sql_add = "UPDATE lophoc SET MaLopHoc = $class_id, Tenlophoc = '$class_name', KhoiHoc = $class_level WHERE MaLopHoc = $id_class";
                $query_add = mysqli_query($conn,$sql_add);
    
                header('location: index.php?page=class');
            }
        }
    }

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="admin.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="admin.php?page=user">Quản lý Lớp Học</a></li>
				<li class="active">Sửa Lớp Học</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sửa Lớp Học</h1>
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
                                    <label>Mã Lớp Học</label>
                                    <input name="class_id" required type="text" class="form-control" value="<?php echo $row['MaLopHoc']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tên Lớp</label>
                                    <input name="class_name" required type="text" class="form-control" value="<?php echo $row['Tenlophoc']; ?>">
                                </div>                       
                                <div class="form-group">
                                    <label>Chọn Khối</label>
                                    <select name="class_level" class="form-control">
                                        <option value=6 <?php if($row['KhoiHoc']==6){echo 'selected';} ?>>Khối 6</option>
                                        <option value=7 <?php if($row['KhoiHoc']==7){echo 'selected';} ?>>Khối 7</option>
                                        <option value=8 <?php if($row['KhoiHoc']==8){echo 'selected';} ?>>Khối 8</option>
                                        <option value=9 <?php if($row['KhoiHoc']==9){echo 'selected';} ?>>Khối 9</option>
                                    </select>
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