<?php
    if (!defined('TEMPLATE')) {
        die('Bạn không có quyền truy cập trang này');
    }

    if (isset($_POST['sbm'])) {
        $user_name = $_POST['user_name'];
        $user_mail = $_POST['user_mail'];
        if ($_POST['user_pass'] != $_POST['user_re_pass']) {
            $error_pass = '<div class="alert alert-danger">Nhập lại mật khẩu sai !</div>';
        }else{
            $pass_forgot = $_POST['user_pass'];
            $user_pass = md5($_POST['user_pass']);
        }

        $user_level = $_POST['user_level'];

        $sql = "SELECT * FROM user WHERE user_mail = '$user_mail'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($query);
        if ($row != "") {
            $error = '<div class="alert alert-danger">Email đã tồn tại !</div>';
        }else {
            $sql1 = "INSERT INTO user(user_name,user_mail,user_pass,pass_forgot,user_level) VALUES ('$user_name','$user_mail','$user_pass','$pass_forgot','$user_level')";
                $query1 = mysqli_query($conn,$sql1);
                header('location: index.php?page=user');
        }
    }
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="index.php?page=user">Quản lý thành viên</a></li>
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
                                    <label>Họ & Tên</label>
                                    <input name="user_name" required class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="user_mail" required type="text" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input name="user_pass" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input name="user_re_pass" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="user_level" class="form-control">
                                        <option value=1>Admin</option>
                                        <option value=2>Member</option>
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