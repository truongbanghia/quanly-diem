<?php
	if (!defined('TEMPLATE')) {
		die('bạn không có quyền truy cập trang này!');
	}
	
	if (!empty($_POST['remember'])) {
		setcookie ("username",$_POST["mail"],time()+ 3600);
		setcookie ("password",$_POST["pass"],time()+ 3600);
	}else{
		setcookie("username","");
		setcookie("password","");
	}
	if (isset($_POST['sbm'])) {
		$user_mail = $_POST['mail'];
		$user_pass = md5($_POST['pass']);

		$sql_user = "SELECT * FROM user WHERE user_mail = '$user_mail' AND user_pass = '$user_pass'";
		$query_user = mysqli_query($conn,$sql_user);
		$sql_gv = "SELECT * FROM giaovien WHERE gv_mail = '$user_mail' AND gv_pass = '$user_pass'";
		$query_gv = mysqli_query($conn,$sql_gv);
		if (mysqli_num_rows($query_user) == 1) {
			$_SESSION['mail_user'] = $user_mail;
			$_SESSION['pass_user'] = $user_pass;
			$row = mysqli_fetch_assoc($query_user);
			$_SESSION['user_level'] = $row['user_level'];

			header('location: index.php');
		}elseif(mysqli_num_rows($query_gv) == 1){
			$_SESSION['mail_gv'] = $user_mail;
			$_SESSION['pass_gv'] = $user_pass;			
			header('location: index.php');
		}else{
			$login_error = '<div class="alert alert-danger">Tài khoản không hợp lệ !</div>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Trang Đăng Nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../img/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../css/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../img/img-01.png" alt="IMG">
				</div>
				
				<form class="login100-form validate-form" method="POST">

					<span class="login100-form-title">
						Member Login
					</span>

					<?php if(isset($login_error)){echo $login_error;}?>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="mail" placeholder="Email" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="checkbox text-center">
						<label>
							<input name="remember" type="checkbox" value="Remember Me" checked>Nhớ tài khoản
						</label>						
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="sbm">
							Login
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="forgot_pass.php">
							Quên mật khẩu
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="../js/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../js/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../js/tilt.jquery.min.js"></script>
	<script >
		$('../.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../js/login.js"></script>

</body>
</html>