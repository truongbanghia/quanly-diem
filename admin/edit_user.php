<?php 
    $user_id = $_GET['user_id'];
    //Lấy thông tin có sẵn của user
    $sql_view = "SELECT * FROM user WHERE user_id = $user_id";
    $query_view = mysqli_query($conn,$sql_view);
    $row_view = mysqli_fetch_assoc($query_view);
    if (isset($_POST['sbm'])) {
        $user_name = $_POST['user_name'];
        $user_mail = $_POST['user_mail'];
        $user_level = $_POST['user_level'];
        //Kiểm tra mail
        $sql_user = "SELECT * FROM user WHERE user_mail = '$user_mail'";
        $query_user = mysqli_query($conn,$sql_user);
        if (mysqli_num_rows($query_user) != "" && $user_mail != $row_view['user_mail']){
            $err1 = '<div class="alert alert-danger">Email Đã tồn tại</div>';
        }else{
            //Lấy thông tin của user_mail kiểm tra trùng hay không            
            if($_POST['user_pass'] == '' && $_POST['user_re_pass']==''){
            $user_pass = $row_view['user_pass'];
            $user_mail = $_POST['user_mail'];
            $sql_update = "UPDATE user SET user_name='$user_name', user_mail = '$user_mail', user_pass = '$user_pass', user_level = '$user_level' WHERE user_id = $user_id";
            $query_update = mysqli_query($conn,$sql_update);
            header('location: index.php?page=user');
            }elseif($_POST['user_pass'] != $_POST['user_re_pass']){
            $err = '<div class="alert alert-danger">Mật khẩu không khớp !</div>';
            }else{
                $user_pass = md5($_POST['user_pass']);
                $user_mail = $_POST['user_mail'];
                $sql_update = "UPDATE user SET user_name='$user_name', user_mail = '$user_mail', user_pass = '$user_pass', user_level = '$user_level' WHERE user_id = $user_id";
                $query_update = mysqli_query($conn,$sql_update);
                header('location: index.php?page=user');
            }
        }

    }

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="index.php?page=user">Quản lý thành viên</a></li>
				<li class="active"><?php echo $row_view['user_name']; ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thành viên: <?php echo $row_view['user_name']; ?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                            <?php if (isset($err)){echo $err;}elseif(isset($err1)){echo $err1;}?>    
                            <form role="form" method="post">
                                <?php 
                                    
                                ?>
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input type="text" name="user_name" class="form-control" value="<?php echo $row_view['user_name']; ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="user_mail" value="<?php echo $row_view['user_mail']; ?>" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="user_pass"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" name="user_re_pass"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="user_level" class="form-control">
                                        <option value=1  <?php if($row_view['user_level'] == 1){ echo 'selected';} ?>>Admin</option>
                                        <option value=2 <?php if($row_view['user_level'] == 2){ echo 'selected';} ?>>Member</option>
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
