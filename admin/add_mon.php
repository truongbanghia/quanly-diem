<?php
    if (!defined('TEMPLATE')) {
        die('Bạn không có quyền truy cập trang này');
    }

    
    if (isset($_POST['sbm'])) {
        $class_id = $_POST['class_id'];
        $class_name = $_POST['class_name'];
        $class_level = $_POST['class_level'];
        $sql = "SELECT * FROM lophoc WHERE Tenlophoc = '$class_name'";
        $query = mysqli_query($conn,$sql);
        if (mysqli_num_rows($query) != "") {
            $err = '<div class="alert alert-danger">Tên lớp học đã bị trùng!</div>';
        }else{
            $sql_add = "INSERT INTO lophoc(MaLopHoc,Tenlophoc,KhoiHoc) VALUES('$class_id','$class_name','$class_level')";
            $query_add = mysqli_query($conn,$sql_add);

            header('location: index.php?page=class');
        }
        
        
    }
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="index.php?page=class">Quản lý Lớp Học</a></li>
				<li class="active">Thêm Môn - Phân Công</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm Môn - Phân Công</h1>
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
                                        <label>Mã Môn Học</label>
                                        <select name="class_level" class="form-control">
                                            <option value=6 >Khối 6</option>                       
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mã Giáo Viên</label>
                                        <select name="class_level" class="form-control">
                                            <option value=6>Khối 6</option>                       
                                        </select>
                                    </div>                      
                                    <div class="form-group">
                                        <label>Mã Lớp Học</label>
                                        <select name="class_level" class="form-control">
                                            <option value=6 >Khối 6</option>                       
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mã Học Kỳ</label>
                                        <select name="class_level" class="form-control">
                                            <option value=6 >Khối 6</option>                       
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô Tả Phân Công</label>
                                        <input name="dayhoc_details" required type="text" class="form-control">
                                    </div> 
                                    <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                                    <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	