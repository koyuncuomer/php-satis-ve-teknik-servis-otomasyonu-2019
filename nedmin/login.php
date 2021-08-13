<!DOCTYPE html>
<html lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/ico" href="../favicon.ico"/>
	<title>Firma Takip Programı</title>
	<!-- Bootstrap -->
	<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress 
		<link href="vendors/nprogress/nprogress.css" rel="stylesheet"> 
	-->
	<!-- Animate.css -->
	<link href="vendors/animate.css/animate.min.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
	<div>
		<a class="hiddenanchor" id="signup"></a>
		<a class="hiddenanchor" id="signin"></a>
		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<form action="production/islem.php" method="POST">
						<h1>Giriş Yap</h1>
						<div>
							<input name="kullanici_eposta" type="text" class="form-control" placeholder="E-Posta Adresi" required="" />
						</div>
						<div>
							<input name="kullanici_sifresi" type="password" class="form-control" placeholder="Şifre" required="" />
						</div>
						<div>
							<button style="width: 50%" type="submit" name="giris" class="btn btn-default">Giriş Yap</button>
							<a class="reset_pass" href="production/sifreunuttum.php">Şifremi unuttum!</a>
						</div>

						<div class="clearfix"></div>

						<?php 

						if (isset($_GET['durum'])) {

							if ($_GET['durum']=="no") { ?>
								<div class="separator">
									<div class="alert alert-danger"> 
										E-posta ya da Şifre yanlış!
									</div>
								</div>

							<?php  } 

							elseif ($_GET['durum']=="cikis") { ?>
								<div class="separator">
									<div class="alert alert-info"> 
										Çıkış Yapıldı.
									</div>
								</div>

							<?php }

							elseif ($_GET['durum']=="noad") { ?>
								<div class="separator">
									<div class="alert alert-danger"> 
										E-posta ya da Şifre yanlış!
									</div>
								</div>

							<?php  }}?>

							<div class="separator">
								<p class="change_link">Kayıtlı değil misin?
									<a href="#signup" class="to_register"> Hesap Oluştur! </a>
								</p>
								<div class="clearfix"></div>
								<br />
								<div>
									<h1>Firma Takip Programı</h1>
									<p>Ömer Koyuncu</p>
								</div>
							</div>
						</form>
					</section>
				</div>
				<div id="register" class="animate form registration_form">
					<section class="login_content">
						<form> 
							<h1>Hesap Oluştur</h1>						
							<div class="alert alert-info"> 
								<p>Servis Kaydı oluşturabilmek için e-posta adresi ve şifreniz ile giriş yapmalısınız. Eğer sistemde kayıtlı bir e-posta adresiniz yoksa ya da herhangi bir nedenden giriş yapamıyorsanız lütfen bizimle iletişime geçin.</p>
							</div>
							<a href="#" target="_blank">
								<input style="width: 50%" type="button" class="btn btn-default" value="İLETİŞİM">
							</a>				
							<div class="clearfix"></div>
							<div class="separator">
								<p class="change_link">Zaten üye misin?
									<a href="#signin" class="to_register"> Giriş Yap </a>
								</p>
								<div class="clearfix"></div>
								<br>
								<div>
									<h1>Firma Takip Programı</h1>
									<p>Ömer Koyuncu</p>
								</div>
							</div>
						</form>
					</section>
				</div>
			</div>
		</div>
	</body>
	</html>