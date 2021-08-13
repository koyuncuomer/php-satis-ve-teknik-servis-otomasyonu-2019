<?php 
//PERSONELLERİN ŞİFRESİ VE DİĞER BİLGİLERİNİN DÜZENLENDİĞİ SAYFA
//SUPERADMİN HER PERSONELİ DÜZENLEYEBİLİR GERİKALAN SADECE KENDİ BİLGİLERİNİ
// personelkayitislem.php GİDER
include 'header.php';
include 'array.php';

$bilgilerimsor=$db->prepare("SELECT * FROM personel where personel_id=:personel_id");
$bilgilerimsor->execute(array(
	'personel_id'=>$_GET['personel_id']
));

$bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC);

if ($kullanicicek['yetki']==1) {  //kullanicicek headerdan geliyor
  //echo "superadmin girdi";
}
elseif ($kullanicicek['personel_id']==$_GET['personel_id']) {
  //echo "kullanici ile alinan id ayni";
}
else{
	Header("Location:index.php?izinsiz");
	exit();
}
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
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Personel Düzenle <small>(Personel düzenleme buradan yapılır..)</small></h2>
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
						<?php 

						if ($_GET['durum']=="gunok") {?>

							<div class="alert alert-success">
								<strong>Başarılı!</strong> Güncelleme başarılı!
							</div>

						<?php } elseif ($_GET['durum']=="gunno") {?>

							<div class="alert alert-danger">
								<strong>Hata!</strong> Güncelleme başarısız!
							</div>
						<?php } ?>

						<form action="personelkayitislem.php" method="POST" id="demo-form3" data-parsley-validate class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Personel Adı<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="personel_adi" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['personel_adi'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Personel Soyadı<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text"  name="personel_soyadi" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['personel_soyadi'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Adı<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="email" name="kullanici_adi" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['kullanici_adi'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Görevi</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  class="form-control col-md-7 col-xs-12" type="text" name="gorevi" value="<?php echo $bilgilerimcek['gorevi'] ?>">
								</div>
							</div>

							<?php if ($kullanicicek['yetki']==1) { ?>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="yetki">Yetki</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<select id="yetki" name="yetki" required="required" class="form-control col-md-12 col-sm-6 col-xs-12">
											<option class="col-md-12" value="<?php echo $bilgilerimcek['yetki'] ?>">Şuan: <?php echo $bilgilerimcek['yetki'] ?></option>
											<?php
											foreach ($yetkiler as $key => $deger) {
												?>
												<option><?php echo $key." - ".$deger; ?></option>
												<?php 
											} ?>
										</select>
									</div>
								</div> 
							<?php }
							else{ ?>
								<input type="hidden" value="<?php echo $kullanicicek['yetki'] ?>" name="yetki">
							<?php } ?>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">E-mail adresi<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="mail_adresi" class="form-control col-md-7 col-xs-12" required="required" type="email" value="<?php echo $bilgilerimcek['mail_adresi'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Cep Telefonu</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="cep_no" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $bilgilerimcek['cep_no'] ?>">
								</div>
							</div>

							<input type="hidden" value="<?php echo $bilgilerimcek['personel_id'] ?>" name="personel_id">
							<input type="hidden" value="<?php echo $_SESSION['kullanici_adi']; ?>" name="admin">

							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<a class="btn btn-danger" href="personel.php">İptal</a>
									<button name="personelupdate" type="submit" class="btn btn-success">Onayla</button>
								</div>
							</div>
						</form>
					</div>

					<div class="x_title">
						<h2>Şifre Düzenle <small>(Şifre diğer bilgilerden ayrı düzenlenmektedir.)</small></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<form action="personelkayitislem.php" method="POST" class="form-horizontal checkout" role="form">
							<?php 

							if ($_GET['durum']=="sifreleruyusmuyor") {?>

								<div class="alert alert-danger">
									<strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
								</div>

							<?php } elseif ($_GET['durum']=="no") {?>

								<div class="alert alert-danger">
									<strong>Hata!</strong> Şifre değiştirilirken bir sorunla karşılaşıldı.
								</div>
							<?php } elseif ($_GET['durum']=="sifredegisti") {?>

								<div class="alert alert-success">
									<strong>Başarılı!</strong> Şifre değiştirildi.
								</div>
							<?php }?>

							<div class="form-group dob">
								<div class="col-md-3">
									<input type="password" class="form-control" name="kullanici_passwordone"  required="required"  placeholder="Yeni Şifrenizi Giriniz">
								</div>
								<div class="col-md-3">
									<input type="password" class="form-control" name="kullanici_passwordtwo" required="required"  placeholder="Yeni Şifrenizi Tekrar Giriniz">
								</div>
							</div>

							<input type="hidden" name="personel_id" value="<?php echo $bilgilerimcek['personel_id'] ?>">

							<input type="hidden" name="kullaniciadi" value="<?php echo $bilgilerimcek['kullanici_adi'] ?>">
							<input type="hidden" value="<?php echo $_SESSION['kullanici_adi']; ?>" name="admin"> 

							<div class="form-group">
								<div class="col-md-3">
									<button type="submit" name="sifreguncelle" class="btn btn-success">Şifre Değiştir</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php' ?>