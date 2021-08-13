<?php 
include 'header.php';
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

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Alıcıların Bilgilerini Eşitle <small>(Bilgileri eşitlenecek alıcının e-mail adresi girilir.)</small></h2>
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

					if ($_GET['servis']=="duzok") {?>

						<div class="alert alert-success">
							<strong>Başarılı!</strong> Servisler tablosundaki kayitlar başarıyla değiştirildi!
						</div>

					<?php } elseif ($_GET['servis']=="duzno") {?>
						<div class="alert alert-danger">
							<strong>Hata!</strong> Servisler tablosundaki kayitlar değiştirilemedi!
						</div>
					<?php } 
					if ($_GET['satis']=="duzok") {?>
						<div class="alert alert-success">
							<strong>Başarılı!</strong> Satislar tablosundaki kayitlar başarıyla değiştirildi!
						</div>
					<?php } elseif ($_GET['satis']=="duzno") {?>
						<div class="alert alert-danger">
							<strong>Hata!</strong> Satislar tablosundaki kayitlar değiştirilemedi!
						</div>

					<?php } ?>
					
					<form action="tumkayitlariesitleislem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Hangi Alıcının Bilgileri Eşitlenecek?</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="email"  name="alici_mail" required="required" placeholder="E-Mail Adresi Girilecek" class="form-control col-md-7 col-xs-12">
							</div>
						</div>

						<div class="ln_solid"></div>

						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<a class="btn btn-danger" href="index.php">İptal</a>
								<button type="submit" name="kayitlaresitle" class="btn btn-success">Onayla</button>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Alıcının E-mail Adresini Değiştir <small>(Mevcut bir E-mail adresi yenisi ile değiştirilir.)</small></h2>
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

					if ($_GET['servise']=="duzok") {?>
						<div class="alert alert-success">
							<strong>Başarılı!</strong> Servisler tablosundaki kayitlar başarıyla değiştirildi!
						</div>
					<?php } elseif ($_GET['servise']=="duzno") {?>
						<div class="alert alert-danger">
							<strong>Hata!</strong> Servisler tablosundaki kayitlar değiştirilemedi!
						</div>
					<?php } 
					if ($_GET['satise']=="duzok") {?>
						<div class="alert alert-success">
							<strong>Başarılı!</strong> Satislar tablosundaki kayitlar başarıyla değiştirildi!
						</div>
					<?php } elseif ($_GET['satise']=="duzno") {?>
						<div class="alert alert-danger">
							<strong>Hata!</strong> Satislar tablosundaki kayitlar değiştirilemedi!
						</div>

					<?php } 
					if ($_GET['alicie']=="duzok") {?>
						<div class="alert alert-success">
							<strong>Başarılı!</strong> Alıcılar tablosundaki kayitlar başarıyla değiştirildi!
						</div>
					<?php } elseif ($_GET['alicie']=="duzno") {?>
						<div class="alert alert-danger">
							<strong>Hata!</strong> Alıcılar tablosundaki kayitlar değiştirilemedi!
						</div>

					<?php } ?>
					
					<form action="tumkayitlariesitleislem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

						<div class="form-group">

							<?php 
							if (isset($_GET['eposta'])) {
								echo '<div class="col-md-5 col-sm-6 col-xs-12">
								<input type="email" name="eski_mail" required="required" value="'.$_GET["eposta"].'" placeholder="Değişecek olan eski E-Mail Adresi Girilecek" class="form-control col-md-5 col-xs-12">
								</div>';
							}else{
								echo '<div class="col-md-5 col-sm-6 col-xs-12">
								<input type="email"  name="eski_mail" required="required" placeholder=" Değişecek olan eski E-Mail Adresi Girilecek" class="form-control col-md-5 col-xs-12">
								</div>';
							}
							?>
							
							<div class="col-md-5 col-sm-6 col-xs-12">
								<input type="email"  name="yeni_mail" required="required" placeholder="Yeni E-Mail Adresi Girilecek" class="form-control col-md-5 col-xs-12">
							</div>
						</div>

						<div class="ln_solid"></div>

						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<a class="btn btn-danger" href="index.php">İptal</a>
								<button type="submit" name="emaildegis" class="btn btn-success">Onayla</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>



<?php include 'footer.php' ?>