<?php 

include 'header.php';
include 'array.php';
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
						<h2>Yeni Müşteri Kaydı <small>(Yeni Ürün Alan Müşterilerin Kaydı Buradan Yapılır..)</small></h2>
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
						<br />
						<form action="musterikayitislem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Firma(Kişi) Adı<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="FirmaAdi" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Yetkilinin Adı<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text"  name="YetkiliAdi" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="sehir">Şehir*</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="sehir" name="Sehir" class="form-control col-md-12 col-sm-6 col-xs-12" required="required">
										<option class="col-md-12" value="">Seçiniz</option>
										<?php
										foreach ($sehirler as $key => $deger) {
											?>
											<option><?php echo $key." - ".$deger; ?></option>
											<?php 
										} ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Adres*</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input class="form-control col-md-7 col-xs-12" type="text" name="Adres" required="required">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">E-mail Adresi
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  name="Eposta" class="form-control col-md-7 col-xs-12" type="email" placeholder="E-mail bilinmiyorsa boş bırakınız!">
									<span style="float: right; color: red">E-mail bilinmiyorsa boş bırakınız!</span>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Cep Telefonu<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  name="CepTelefonu" class="form-control col-md-7 col-xs-12" required="required" type="text">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Telefon 
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="Telefon" class="form-control col-md-7 col-xs-12" type="text">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Faks</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="Faks" class="form-control col-md-7 col-xs-12" type="text">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Vergi Dairesi</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="VergiDaire" class="form-control col-md-7 col-xs-12" type="text">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Vergi No</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="VergiNo" class="form-control col-md-7 col-xs-12" type="text">
								</div>
							</div>

							<input type="hidden" value="<?php echo $_SESSION['kullanici_adi']; ?>" name="admin">

							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<a class="btn btn-danger" href="musteriler.php">İptal</a>
									<button type="submit" name="musterikayitbutton" class="btn btn-success">Onayla</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>

	</div>
</div>



<?php include 'footer.php' ?>