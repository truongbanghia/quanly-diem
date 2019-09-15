<?php 
    include_once('config/connect.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
        
    require '../PHPMailer-master/src/Exception.php';
    require '../PHPMailer-master/src/PHPMailer.php';
    require '../PHPMailer-master/src/SMTP.php';

    if (isset($_POST['mail'])) {
        $user_mail = $_POST['mail'];
        $query = mysqli_query($conn,"SELECT * FROM user WHERE user_mail = '$user_mail'");
        $count = mysqli_num_rows($query);
        $row = mysqli_fetch_assoc($query);
       if ($count == 1) {
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                        $mail->isSMTP();                                            // Set mailer to use SMTP
                        $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                        $mail->Username   = 'truongbanghia@gmail.com';                     // SMTP username
                        $mail->Password   = 'ymcrrihamqcdrbzt';                               // SMTP password
                        $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
                        $mail->Port       = 465;                                    // TCP port to connect to
                        $mail->CharSet = "UTF-8";
                        //Recipients: Người Nhận
                        $mail->setFrom('truongbanghia@gmail.com', 'THCS VIỆT HƯNG');
                        $mail->addAddress($user_mail, $user_mail);     // Add a recipient
                        // $mail->addAddress('ellen@example.com');               // Name is optional
                        // $mail->addReplyTo('info@example.com', 'Information');
                        // $mail->addCC('cc@example.com');
                        // $mail->addBCC('bcc@example.com');
        
                        // // Attachments: Tài Liệu đính kèm
                        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
                        // Content: Nội dung
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Quên mật khẩu';
                        $mail->Body    = 'Xin chào '.$user_mail.', mật khẩu của bạn là: '.$row['pass_forgot'].'' ;
                        $mail->AltBody = 'Xin chào '.$user_mail.', mật khẩu của bạn là: '.$row['pass_forgot'].'';
        
                        $mail->send();
                        header('location: success_forgot_pass.php');
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
        }else {
            $err = '<strong>E-mail</strong> không chính xác - Vui lòng nhập lại !!!';
        }
               
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quên mật khẩu</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/bootstrap-table.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
<div class="row">
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <?php if (isset($err)) {
                echo '<div class="alert alert-danger">';
                echo $err;
                echo ' </div>';
            }elseif(isset($alert)){
                echo '<div class="alert alert-danger">';
                echo $alert;
                echo ' </div>';
            }

            ?>
       
        
        <form role="form" method="post">
		    <fieldset>
			    <div class="form-group">
                    <label for="mail">Vui lòng nhập E-mail: </label>
				    <input class="form-control" placeholder="E-mail" name="mail" type="email" id="mail" autofocus required>
			    </div>
			    <button name="sbm" type="submit" class="btn btn-primary">Đồng Ý</button>
		    </fieldset>
        </form>
    </div>
</div>
</body>
</html>