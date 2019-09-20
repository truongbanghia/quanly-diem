<?php
    if (!defined('TEMPLATE')) {
        die('Bạn không có quyền truy cập trang này');
    }

    $id_class = $_GET['id_class'];

    if (isset($_POST['sbm'])) {
        $maMonHoc = $_POST['MaMonHoc'];

        header('location: index.php?page=add_mon_gv&id_mon='.$maMonHoc.'&id_class='.$id_class.'');
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
				<h1 class="page-header">Vui lòng chọn môn học</h1>
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
                                        <label>Tên Môn Học</label>
                                        <select name="MaMonHoc" class="form-control">
                                            <?php
                                                $query_monhoc = mysqli_query($conn,"SELECT * FROM monhoc");
                                                while ($row_monhoc = mysqli_fetch_assoc($query_monhoc)) { 
                                                                                               
                                                    // $sql_lophoc = "SELECT * FROM dayhoc JOIN monhoc ON dayhoc.MaMonHoc = monhoc.MaMonHoc JOIN giaovien ON dayhoc.MaGV = giaovien.MaGV JOIN lophoc ON dayhoc.MaLopHoc = lophoc.MaLopHoc WHERE dayhoc.MaLopHoc = '$id_class'";
                                                    // $query_lophoc = mysqli_query($conn,$sql_lophoc);
                                                    // while ($row_lophoc = mysqli_fetch_assoc($query_lophoc)) {                                                        
                                                    
                                            ?>
                                                    <option value=<?php echo $row_monhoc['MaMonHoc']; ?> ><?php echo $row_monhoc['TenMonHoc']; ?></option>
                                                
                                            <?php } ?>

                                        </select>
                                    </div>                                                                                                        
                                    <button name="sbm" type="submit" class="btn btn-success">Chọn</button>                                   
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	