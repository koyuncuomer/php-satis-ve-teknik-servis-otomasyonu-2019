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

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Yeni Satış Kaydı <small>(Yeni Yapılan Tüm Satışların Kaydı Buradan Yapılır..)</small></h2>
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
						<form action="satiskayitislem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="firma_sehir">Firma(Kişi) Adı</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="firma_sehir" name="firma_sehir" class="form-control col-md-12 col-sm-6 col-xs-12" required="required">
										<option class="col-md-12" value="">Seçiniz</option>
										<?php 
										$bilgilerimsor=$db->prepare("SELECT * FROM alicilar order by FirmaAdi");
										$bilgilerimsor->execute();

										while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC))
										{
											?>
											<option><?php echo $bilgilerimcek['FirmaAdi']." / ".$bilgilerimcek['Sehir'] ?></option>
											<?php 
										} ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="heard">Model Adı</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select name="model_adi" class="form-control col-md-12 col-sm-6 col-xs-12" required="required">
										<option class="col-md-12" value="">Seçiniz</option>
										<?php 
										$bilgilerimsor=$db->prepare("SELECT * FROM model order by model_id");
										$bilgilerimsor->execute();

										while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC))
										{
											?>
											<option><?php echo $bilgilerimcek['model_adi']?></option>
											<?php 
										} ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ürün SeriNo
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text"  name="urun_serino" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Satış Tarihi<span class="required"></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="satis_tarih" name="satis_tarihi" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" >
								</div>
							</div>

							<input type="hidden" value="<?php echo $_SESSION['kullanici_adi']; ?>" name="admin"> 

							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<button type="submit" name="satiskayitbutton" class="btn btn-success">Onayla</button>
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