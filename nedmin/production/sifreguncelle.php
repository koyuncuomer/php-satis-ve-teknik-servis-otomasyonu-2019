<?php 
error_reporting(0);
include 'musterisayfasiheader.php';
?>

<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Firma <small>Takip</small></h3>
				<br>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-6 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Şifre Güncelleme <small>(Şifre Güncelleme Buradan Yapılır..)</small></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Settings 1</a>
									</li>
									<li><a href="#">Settings 2</a>
									</li>
								</ul>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<form action="islem.php" method="POST" class="form-horizontal checkout" role="form">

							<?php 

							if ($_GET['durum']=="sifreleruyusmuyor") {?>

								<div class="alert alert-danger">
									<strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
								</div>

							<?php } elseif ($_GET['durum']=="eksiksifre") {?>

								<div class="alert alert-danger">
									<strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
								</div>

							<?php } elseif ($_GET['durum']=="no") {?>

								<div class="alert alert-danger">
									<strong>Hata!</strong> Şifre değiştirilirken bir sorunla karşılaşıldı.
								</div>

							<?php } elseif ($_GET['durum']=="sifredegisti") {?>

								<div class="alert alert-success">
									<strong>Başarılı!</strong> Şifreniz başarıyla değişti!
								</div>

							<?php } elseif ($_GET['durum']=="eskisifrehata") {?>

								<div class="alert alert-danger">
									<strong>Hata!</strong> Eski şifreniz yanlış.
								</div>
							<?php }?>


							<div class="form-group dob">
								<div class="col-sm-12">

									<input type="password" class="form-control" required="" name="kullanici_eskipassword" placeholder="Eski Şifrenizi Giriniz">
								</div>

							</div>

							<div class="form-group dob">
								<div class="col-sm-6">
									<input type="password" class="form-control" name="kullanici_passwordone" placeholder="Yeni Şifrenizi Giriniz">
								</div>
								<div class="col-sm-6">
									<input type="password" class="form-control" name="kullanici_passwordtwo" placeholder="Yeni Şifrenizi Tekrar Giriniz">
								</div>
							</div>

							<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['AliciId'] ?>">

							<input type="hidden" name="yetkili_adi" value="<?php echo $kullanicicek['YetkiliAdi'] ?>">

							<input type="hidden" name="mail_adresi" value="<?php echo $_SESSION['kullanici_eposta']; ?>">

							<div class="ln_solid"></div>


							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<a class="btn btn-danger" href="musteriserviskayitlarim.php">İptal</a>
									<button type="submit" name="kullanicisifreguncelle" class="btn btn-success">Şifre Değiştir</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include "footer.php" ?>