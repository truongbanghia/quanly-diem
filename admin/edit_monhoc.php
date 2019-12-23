<?php
    if (!defined('TEMPLATE')) {
        die('Bạn không có quyền truy cập trang này');
    }
    $maMon = $_GET['monhoc_id'];
    if (isset($_POST['sbm'])) {
       $id_mon = $_POST['id_mon'];
       $name_mon = $_POST['name_mon'];
       $num_mon = $_POST['num_mon'];
       $heSo = $_POST['heSo'];

       if($id_mon != $maMon){
            $sql = "SELECT * FROM monhoc WHERE MaMonHoc = '$id_mon'";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) == ""){
                $sql_insert = "UPDATE monhoc SET MaMonHoc = '$id_mon',TenMonHoc ='$name_mon',SoTiet = '$num_mon',HeSoMonHoc = '$heSo' WHERE MaMonHoc = '$maMon'";
                $query_insert = mysqli_query($conn,$sql_insert);
                header('location: index.php?page=monhoc');
            }else{
                echo '<script>';
                echo "alert('Mã Môn Học đã bị trùng!')";
                echo '</script>';
            }
       }else{
            $sql_insert = "UPDATE monhoc SET MaMonHoc = '$id_mon',TenMonHoc ='$name_mon',SoTiet = '$num_mon',HeSoMonHoc = '$heSo' WHERE MaMonHoc = '$maMon'";
            $query_insert = mysqli_query($conn,$sql_insert);
            header('location: index.php?page=monhoc');
       }
    }
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="index.php?page=monhoc">Quản lý môn học</a></li>
				<li class="active">Thêm Môn Học</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
                <h1 class="page-header">Thêm Môn Học </h1>            
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                            <?php 
                                
                                $sql = "SELECT * FROM monhoc WHERE MaMonHoc = '$maMon'";
                                $query = mysqli_query($conn,$sql);
                                $row = mysqli_fetch_assoc($query);
                            ?>
                            <!-- <div class="alert alert-danger">Tên lớp học đã bị trùng !</div> -->
                                <form role="form" method="post">
                                <div class="form-group">
                                    <label>Mã Môn Học</label>
                                    <input name="id_mon" required type="text" maxlength="5" class="form-control" value="<?php echo $row['MaMonHoc'] ?>">
                                </div> 
                                <div class="form-group">
                                    <label>Tên Môn Học</label>
                                    <input name="name_mon" required type="text" class="form-control" value="<?php echo $row['TenMonHoc'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Số Tiết</label>
                                    <input name="num_mon" required type="number" class="form-control" value="<?php echo $row['SoTiet'] ?>">
                                </div>                                 
                                <div class="form-group">
                                    <label>Hệ Số Môn Học</label>
                                    <select name="heSo">
                                        <option value="1" <?php if($row['HeSoMonHoc'] == 1){echo 'selected';} ?>>Hệ số 1</option>
                                        <option value="2" <?php if($row['HeSoMonHoc'] == 2){echo 'selected';} ?>>Hệ số 2</option>
                                    </select>
                                </div>                            
                                <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                                
                        </form> 
                                           
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	