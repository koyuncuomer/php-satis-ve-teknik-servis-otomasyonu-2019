<?php 
require_once 'baglan.php';
ob_start();
session_start(); 

$user_eposta = $_SESSION['kullanici_eposta'];
$kullanicisor=$db->prepare("SELECT * from alicilar where Eposta=:eposta");
$kullanicisor->execute(array(
	'eposta'=> $user_eposta
));
$kontrol=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
if ($kontrol==0) {
	Header("Location:../login.php?izinsiz");
	exit();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/ico" href="../../favicon.ico"/>

	<title>Firma Takip</title>

	<!-- Bootstrap -->
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress 
  	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">-->
  <!-- iCheck 
  	<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet"> -->
  	<!-- Datatables -->
  	<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <!-- 
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet"> -->
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="http://omerkoyuncu.com.tr/" target="_blank" class="site_title"><i class="fa fa-user"></i> <span>firmafoobar</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="images/user.png" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Hoşgeldiniz,</span>
							<h2><?php echo $kullanicicek['YetkiliAdi'];?></h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<ul class="nav side-menu">

								<li><a href="musteriserviskayitlarim.php"><i class="fa fa-home"></i>Servis Kayıtlarım</a></li>

								<li><a href="satinaldigimurunler.php"><i class="fa fa-briefcase"></i>Satın Aldığım Ürünler</a></li>

								<li><a><i class="fa fa-cogs"></i> Ayarlar <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="sifreguncelle.php">Şifre Değiştir</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div> 
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>

						<ul class="nav navbar-nav navbar-right">
							<li class="">


								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<img src="images/user.png" alt=""><?php echo $_SESSION['kullanici_eposta']; ?>
									<span class=" fa fa-angle-down"></span>
								</a>

								<ul class="dropdown-menu dropdown-usermenu pull-right">

									<li><a href="logout.php?gelis=user"><i class="fa fa-sign-out pull-right"></i>Çıkış Yap!</a></li>
								</ul>
							</li>

						</ul>
					</nav>
				</div>
			</div>
        <!-- /top navigation -->