<?php
    if (!defined('TEMPLATE')) {
        die('Bạn không có quyền truy cập trang này');
    }

    $id_mon = $_GET['id_mon'];
    $id_class = $_GET['id_class'];

    $sql = "SELECT * FROM giaovien WHERE MaMonHoc = '$id_mon'";
    $query = mysqli_query($conn,$sql);

    if (isset($_POST['sbm'])) {
        $maGV = $_POST['maGV'];
        $maHK = $_POST['maHK'];
        $details = $_POST['details'];

        $sql_dayHoc = "SELECT * FROM dayhoc WHERE MaMonHoc = '$id_mon' AND MaLopHoc = '$id_class'";
        $query_dayHoc = mysqli_query($conn,$sql_dayHoc);

        if (mysqli_num_rows($query_dayHoc) != "") {
            
            $sql_update = "UPDATE dayhoc SET MaMonHoc = '$id_mon', MaGV = '$maGV', MaLopHoc = '$id_class', MaHocKy = '$maHK', MoTaPhanCong = '$details' WHERE MaMonHoc = '$id_mon' AND MaLopHoc = '$id_class'";
            $query_update = mysqli_query($conn,$sql_update);

            header('location: index.php?page=list_mon&id_class='.$id_class.'');
        }
    }
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="index.php?page=class">Quản lý Lớp Học</a></li>
				<li class="active">Phân Công Giảng Dạy</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Phân Công Giáo Viên </h1>
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
                                        <label>Tên Giáo Viên</label>
                                        <select name="maGV" class="form-control">
                                            <?php while ($row = mysqli_fetch_assoc($query)) {                                              
                                            ?>
                                                <option value=<?php echo $row['MaGV']; ?> ><?php echo $row['TenGV']; ?></option> 
                                            <?php } ?>                     
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tên Học Kỳ</label>
                                        <select name="maHK" class="form-control">
                                            <?php
                                                $query_hocky = mysqli_query($conn,"SELECT * FROM hocky");
                                                while ($row = mysqli_fetch_assoc($query_hocky)) {                                              
                                            ?>
                                                <option value=<?php echo $row['MaHocKy']; ?> ><?php echo $row['TenHocKy']; ?></option> 
                                            <?php } ?>                     
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô Tả Phân Công</label>
                                        <input name="details" type="text" class="form-control">
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