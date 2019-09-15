<?php
    if (!defined('TEMPLATE')) {
        die('Bạn không có quyền truy cập trang này');
    }

    if (isset($_POST['sbm'])) {
        $teacher_id = $_POST['teacher_id'];
        $teacher_name = $_POST['teacher_name'];
        $teacher_mail = $_POST['teacher_mail'];
        $teacher_address = $_POST['teacher_address'];
        $teacher_phone = $_POST['teacher_phone'];
        if ($_POST['teacher_pass'] != $_POST['teacher_re_pass']) {
            $error_pass = '<div class="alert alert-danger">Nhập lại mật khẩu sai !</div>';
        }else{                        
            $teacher_pass = md5($_POST['teacher_pass']);
        }

        $teaching = $_POST['teaching'];

        $sql = "SELECT * FROM giaovien WHERE gv_mail = '$teacher_mail'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($query);
        if ($row != "") {
            $error = '<div class="alert alert-danger">Email đã tồn tại !</div>';
        }else {
                $sql1 = "INSERT INTO giaovien(MaGV,MaMonHoc,TenGV,DiaChi,SDT,gv_mail,gv_pass) VALUES ('$teacher_id','$teaching','$teacher_name','$teacher_address','$teacher_phone','$teacher_mail','$teacher_pass')";
                $query1 = mysqli_query($conn,$sql1);
                header('location: index.php?page=teacher');
        }
    }
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="admin.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="admin.php?page=user">Quản lý thành viên</a></li>
				<li class="active">Thêm thành viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm thành viên</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                            <?php if (isset($error_pass)  ) {
                                    echo $error_pass;
                                }elseif (isset($error)) {
                                    echo $error;
                                } ?>
                                <form role="form" method="post">
                                <div class="form-group">
                                    <label>Mã Giáo Viên</label>
                                    <input name="teacher_id" required class="form-control" type="number">
                                </div>
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input name="teacher_name" required class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="teacher_mail" required type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Địa Chỉ</label>
                                    <input name="teacher_address" required type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>SĐT</label>
                                    <input name="teacher_phone" required type="number" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input name="teacher_pass" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input name="teacher_re_pass" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Môn Giảng Dạy</label>
                                    <select name="teaching" class="form-control">
                                        <?php 
                                            $sql_mon_hoc = "SELECT * FROM monhoc";
                                            $query_mon_hoc = mysqli_query($conn,$sql_mon_hoc) ;
                                            while ($row_mon_hoc = mysqli_fetch_assoc($query_mon_hoc)) {                                            
                                        ?>
                                                <option value=<?php echo $row_mon_hoc['MaMonHoc']; ?>><?php echo $row_mon_hoc['TenMonHoc']; ?></option>
                                            <?php } ?>                                  
                                    </select>
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