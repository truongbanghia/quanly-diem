<?php
    if (!defined('TEMPLATE')) {
        die('Bạn không có quyền truy cập trang này');
    }
    $mail = $_SESSION['mail_user'];
    if (isset($_POST['sbm'])) {
        $pass_old = $_POST['pass_old'];
        $sql_check="SELECT * FROM user WHERE user_mail = '$mail' ";
        $query_check = mysqli_query($conn,$sql_check);
        $row = mysqli_fetch_assoc($query_check);
        if ($pass_old == $row['pass_forgot']) {
            $pass_token = $_POST['pass_new'];
            $pass_new = md5($_POST['pass_new']);            
            $pass_new_re = md5($_POST['pass_new_re']);
            if ($pass_new == $pass_new_re) {
                $sql_update = "UPDATE user SET user_pass = '$pass_new', pass_forgot='$pass_token' WHERE user_mail = '$mail'";
                $query_update = mysqli_query($conn,$sql_update);
                $success = true;
            }else{
                $err = true;
            }
        }else{
            $err = true;   
        }
    }
    
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="index.php?page=class">Quản lý nhân viên</a></li>
				<li class="active">Tthay đổi mật khẩu</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thay đổi mật khẩu: <?php echo $_SESSION['mail_user'];  ?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                            <!-- <div class="alert alert-danger">Tên lớp học đã bị trùng !</div> -->
                        <form role="form" method="post">
                                <?php
                                    if (isset($err)) {
                                        echo '<div class="alert alert-danger" role="alert">';
                                        echo '<strong>Sai thông tin - Yêu cầu nhập lại!</strong>';
                                        echo '</div>';
                                    }elseif(isset($success)){
                                        echo '<div class="alert alert-success" role="alert">';
                                        echo '<strong>Đổi mật khẩu thành công!</strong>';
                                        echo '</div>';
                                    }
                                ?>
                                <div class="form-group">
                                    <label>Mật khẩu cũ</label>
                                    <input name="pass_old" required type="password" minlength="6" class="form-control">
                                </div> 
                                <div class="form-group">
                                    <label>Mật khẩu mới</label>
                                    <input name="pass_new" required type="password" minlength="6" class="form-control">
                                </div>                                                                                               
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu mới</label>
                                    <input name="pass_new_re" required type="password" minlength="6" class="form-control">
                                </div>                         
                                <button name="sbm" type="submit" class="btn btn-success">Chấp Nhận  </button>
                                <button type="reset" class="btn btn-default">Làm mới</button>                                                                                                                    
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	