<!-- MÜŞTERİLERİN ŞİFRE UNUTTUM SAYFASI /mail/sifreislemleri.php YÖNLENDİRİYOR -->
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/ico" href="../../favicon.ico"/>

	<title>Şifremi Unuttum</title>

	<!-- Bootstrap -->
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- Animate.css -->
	<link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
	<div>
		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<form action="../mailphp/sifreislemleri.php" method="POST">
						<h1>Şifremi Unuttum</h1>
						<div>
							<input name="kullanici_eposta" type="email" class="form-control" placeholder="E-posta adresi." required="" />
						</div>

						<?php 
						$sayi1=rand(10,30);
						$sayi2=rand(0,10);
						$toplam=$sayi1+$sayi2;
						?>

						<input type="hidden" value="<?php echo $toplam; ?>" name="toplam">

						<div>
							
							<input type="text" name="islem"  placeholder="<?php echo $sayi1." + ".$sayi2. " kaçtır?";  ?>" class="form-control" id="name">
						</div>

						<div>
							<button style="width: 50%" type="submit" name="sifreunuttum" class="btn btn-default">Şifremi Yenile</button>
							<a class="reset_pass" href="../login.php">Giriş Yap.</a>
						</div>

						<div class="clearfix"></div>

						<?php 

						if (isset($_GET['durum'])) {

							if ($_GET['durum']=="ok" || $_GET['durum']=="ok0") { ?>
								<div class="separator">
									<div class="alert alert-success"> 
										Eğer sistemde kayıtlı böyle bir e-posta adresi varsa yeni şifreniz oluşturulup bu adrese gönderilmiştir. <br>
										Lütfen e-postanızı kontrol ediniz.
									</div>
								</div>
							<?php  } 
							elseif ($_GET['durum']=="bot") { ?>
								<div class="separator">
									<div class="alert alert-danger"> 
										Doğrulama işlemi yanlış! Tekrar deneyiniz.
									</div>
								</div>
							<?php } 
							else if($_GET['durum']=="no" || $_GET['durum']=="no0"){ ?>
								<div class="separator">
									<div class="alert alert-info"> 
										Eğer sistemde kayıtlı böyle bir e-posta adresi varsa yeni şifreniz oluşturulup bu adrese gönderilmiştir. <br>
										Lütfen e-postanızı kontrol ediniz.
									</div>
								</div>
							<?php }} ?>


							<div class="separator">

								<div class="clearfix"></div>
								<br />

								<div>
									<h1><i class="fa fa-user"></i> Firma Takip Sitesi</h1>
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
