<?php 
if (!defined('TEMPLATE')) {
    die('bạn không có quyền truy cập trang này!');
}
    $teacher_id = $_GET['teacher_id'];
    //Lấy thông tin có sẵn của user
    $sql_view = "SELECT * FROM giaovien WHERE MaGV = '$teacher_id'";
    $query_view = mysqli_query($conn,$sql_view);
    $row_view = mysqli_fetch_assoc($query_view);
    if (isset($_POST['sbm'])) {
        $teacher_id = $_POST['teacher_id'];
        $teacher_name = $_POST['teacher_name'];
        $teacher_mail = $_POST['teacher_mail'];
        $teacher_address = $_POST['teacher_address'];
        $teacher_phone = $_POST['teacher_phone'];
        $teaching = $_POST['teaching'];
        //Kiểm tra mail
        $sql_teacher = "SELECT * FROM giaovien WHERE gv_mail = '$teacher_mail'";
        $query_teacher = mysqli_query($conn,$sql_teacher);
        if (mysqli_num_rows($query_teacher) != "" && $teacher_mail != $row_view['gv_mail']){
            $err1 = '<div class="alert alert-danger">Email Đã tồn tại</div>';
        }else{
            //Lấy thông tin của mail kiểm tra trùng hay không            
            if($_POST['teacher_pass'] == '' && $_POST['teacher_re_pass']==''){
                $teacher_pass = $row_view['gv_pass'];
                $teacher_mail = $_POST['teacher_mail'];
                $sql_update = "UPDATE giaovien SET MaGV = '$teacher_id', MaMonHoc = '$teaching', TenGV = '$teacher_name', DiaChi = '$teacher_address' , SDT = '$teacher_phone', gv_mail = '$teacher_mail', gv_pass = '$teacher_pass' WHERE MaGV = $teacher_id";
                $query_update = mysqli_query($conn,$sql_update);
                header('location: index.php?page=teacher');
            }elseif($_POST['teacher_pass'] != $_POST['teacher_re_pass']){
                $err = '<div class="alert alert-danger">Mật khẩu không khớp !</div>';
            }else{    
                $teacher_pass = md5($_POST['teacher_pass']);
                $teacher_mail = $_POST['teacher_mail'];
                $sql_update = "UPDATE giaovien SET MaGV='$teacher_id', MaMonHoc='$teaching', TenGV='$teacher_name',DiaChi='$teacher_address' ,SDT='$teacher_phone', gv_mail='$teacher_mail', gv_pass='$teacher_pass' WHERE MaGV = $teacher_id";
                $query_update = mysqli_query($conn,$sql_update);
                header('location: index.php?page=teacher');
            }
        }

    }

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="index.php?page=teacher">Quản lý giáo viên</a></li>
				<li class="active"><?php echo $row_view['TenGV']; ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thành viên: <?php echo $row_view['TenGV']; ?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                            <?php if (isset($err)){echo $err;}elseif(isset($err1)){echo $err1;}?>    
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Mã Giáo Viên</label>
                                    <input type="number" name="teacher_id" class="form-control" value="<?php echo $row_view['MaGV']; ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input type="text" name="teacher_name" class="form-control" value="<?php echo $row_view['TenGV']; ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="teacher_mail" value="<?php echo $row_view['gv_mail']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Địa Chỉ</label>
                                    <input name="teacher_address" required type="text" class="form-control" value="<?php echo $row_view['DiaChi']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>SĐT</label>
                                    <input name="teacher_phone" required type="number" class="form-control" value="<?php echo $row_view['SDT']; ?>">
                                </div>                        
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="teacher_pass"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" name="teacher_re_pass"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Môn Giảng Dạy</label>
                                    <select name="teaching" class="form-control">
                                    <?php 
                                            $sql_mon_hoc = "SELECT * FROM monhoc";
                                            $query_mon_hoc = mysqli_query($conn,$sql_mon_hoc) ;
                                            while ($row_mon_hoc = mysqli_fetch_assoc($query_mon_hoc)) {                                            
                                        ?>
                                                <option value=<?php echo $row_mon_hoc['MaMonHoc']; ?> <?php if($row_mon_hoc['MaMonHoc'] == $row_view['MaMonHoc']){echo 'selected';} ?>><?php echo $row_mon_hoc['TenMonHoc'] ?></option> 
                                            <?php } ?>                                       
                                    </select>
                                </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
