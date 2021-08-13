<?php 
error_reporting(0);
require_once 'baglan.php';

ob_start();
session_start(); 

$kullanicisor=$db->prepare("SELECT * from personel where kullanici_adi=:adi");
$kullanicisor->execute(array(
	'adi'=> $_SESSION['kullanici_adi']
));
$kontrol=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
//echo $kullanicicek['personel_soyadi
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
  	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet"> -->
  <!-- iCheck 
  	<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet"> -->
  	<!-- Datatables -->
  	<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <!-- 
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet"> -->
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.php" class="site_title"><i class="fa fa-user"></i> <span>firmafoobar</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="images/user.png" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Hoşgeldiniz,</span>
							<h2><?php echo $kullanicicek['personel_adi']." ".$kullanicicek['personel_soyadi'] ?></h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<ul class="nav side-menu">

								<li><a href="index.php"><i class="fa fa-home"></i>Ana Sayfa</a></li>

								<!-- <li><a href="yeniserviskayit.php"><i class="fa fa-save"></i>Yeni Servis Kayıt</a></li> -->

								<li><a><i class="fa fa-taxi"></i> Servis Kayıtları <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="serviskayitlari.php">Tümü</a></li>
										<li><a href="serviskayitlari_beklemede.php">Beklemede</a></li>
										<li><a href="serviskayitlari_tamirde.php">Tamirde</a></li>
										<li><a href="serviskayitlari_teslimehazir.php">Teslime Hazır</a></li>
										<li><a href="serviskayitlari_teslimedildi.php">Teslim Edildi</a></li>

									</ul>
								</li>

								<li><a><i class="fa fa-users"></i>Müşteriler <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">

										<li><a href="musteriler.php">Tüm Müşteriler</a></li>
										<li><a href="yenimusterikayit.php">Yeni Müşteri Ekle</a></li>

									</ul>
								</li>

								<li><a><i class="fa fa-pencil-square-o"></i>Satışlar <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">

										<li><a href="satislar.php">Tüm Satışlar</a></li>
										<li><a href="yenisatiskayit.php">Yeni Satış Ekle</a></li>

									</ul>
								</li>

								<li><a><i class="fa fa-archive"></i>Modeller<span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">

										<li><a href="modeller.php">Tüm Modeller</a></li>
										<li><a href="yenimodelkayit.php">Yeni Model Ekle</a></li>

									</ul>
								</li>

								<?php 
								if ($kullanicicek['yetki']==1) { ?>
									<li><a href="personel.php"><i class="fa fa-user"></i>Personel</a></li>
								<?php  }
								elseif ($kullanicicek['yetki']==2) { ?>
									<li><a href="personel_incele.php?personel_id=<?php echo $kullanicicek['personel_id'] ?>"><i class="fa fa-user"></i>Hesap Bilgilerimi Düzenle</a></li>
								<?php }
								if ($kullanicicek['yetki']<=2) { ?>
									<li><a href="logkayitlari.php"><i class="fa fa-file-text-o"></i>Log Kayıtları</a></li>
								<?php  } ?>

								<li><a href="tumkayitlariesitle.php"><i class="fa fa-plus"></i> Diğer Düzenlemeler</a>
								</li>

								<!-- <li><a href="index.php"><i class="fa fa-book"></i>Raporlar</a></li> -->

							</ul>

						</div>

					</div>
					<!-- /sidebar menu -->

          <!-- /menu footer buttons 
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>-->
          <!-- /menu footer buttons -->
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
      						<img src="images/user.png" alt=""><?php echo $_SESSION['kullanici_adi']; ?>
      						<span class=" fa fa-angle-down"></span>
      					</a>
      					<ul class="dropdown-menu dropdown-usermenu pull-right">
                  <!-- 
                  <li><a href="javascript:;"> Profile</a></li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li><a href="javascript:;">Help</a></li>
                -->
                <li><a href="logout.php?gelis=admin"><i class="fa fa-sign-out pull-right"></i>Çıkış Yap!</a></li>
              </ul>
            </li>

            <!-- 
            <li role="presentation" class="dropdown">
              <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-green">6</span>
              </a>
              <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                <li>
                  <a>
                    <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                    <span>
                      <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                      Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                    <span>
                      <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                      Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                    <span>
                      <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                      Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                    <span>
                      <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                      Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                  </a>
                </li>
                <li>
                  <div class="text-center">
                    <a>
                      <strong>See All Alerts</strong>
                      <i class="fa fa-angle-right"></i>
                    </a>
                  </div>
                </li>
              </ul>
            </li>
          -->
        </ul>
      </nav>
    </div>
  </div>
<!-- /top navigation -->