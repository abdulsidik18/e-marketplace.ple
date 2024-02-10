<?php
session_start();
include "conn.php";

// Notif Error
$Err = "";
if(isset ($_GET ["Err"]) && !empty ($_GET ["Err"])){
	switch ($_GET ["Err"]){
		case 1:
			$Err = "Username dan Password Kosong";
		break;
		case 2:
			$Err = "Username Kosong";
		break;
		case 3:
			$Err = "Password Kosong";
		break;
		case 4:
			$Err = "Password salah";
		break;
		case 5:
			$Err = "Maaf password anda tidak terdaftar silahkan hubungi bagian admin UNDA";
		break;
		case 6:
			$Err = "Maaf, Terjadi Kesalahan";
		break;
	}
}

// Notif
$Notif = "";
if(isset ($_GET["Notif"]) && !empty ($_GET["Notif"])){
	switch($_GET["Notif"]){
		case 1:
			$Notif = "User berhasil dibuat, silahkan Login";
		break;
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
   <title>E-COMMERCE | Tanaman Florikultura </title> 
    <link href='img/icons/favicon.ico' rel='shortcut icon'>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/fa/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist1/css/template.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  
  </head>
  <body class="hold-transition login-page" style="background-image: url(img/admin/login.jpg);">
    <body class="hold-transition login-page">
     <!-- <audio src="music/suara.mp3" autoplay="autoplay"></audio> -->
<div class="login-box">
<img src="img/admin/admin.png" class="avatar">
  <div class="login-logo">
     <h1>Silahkan Login</h1>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <form class="form-signin" method="post" action="proseslogin.php">
          <div class="form-group has-feedback">
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" maxlength="30" />
            <span class="form-control-feedback"><i class="fa fa-user"></i></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" maxlength="255" />
            <span class="form-control-feedback"><i class="fa fa-unlock"></i></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary">Masuk <i class="fa fa-sign-in"></i></button>
            </div><!-- /.col -->
		  <br>
			<center><font style="color:red;"><?php echo $Err ?></font></center>
			<center><font style="color:green;"><?php echo $Notif ?></font></center>
		</br>
        </form>

		
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <marquee>Selamat Datang Admin Kantor Pulau E-Commerce Tanaman Florikultura</marquee>

    <!-- jQuery 2.1.4 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="assets/plugins/iCheck/icheck.min.js"></script>
  
  </body>
</html>