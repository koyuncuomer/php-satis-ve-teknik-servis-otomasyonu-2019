<?php  

include 'musterisayfasiheader.php';

date_default_timezone_set('Europe/Istanbul');

$kullanici_eposta=$_SESSION['kullanici_eposta'];

$satislarsor=$db->prepare("SELECT * FROM satislar where satis_id=:id and Eposta=:eposta");
$satislarsor->execute(array(
	'eposta'=>$kullanici_eposta,
	'id'=> $_GET['id']
));

$satislarcek=$satislarsor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
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
						<h2>Müşteri Bilgileri <small>(Servise gönderilecek ürünün sahibi hakkında bilgiler)</small></h2>
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
						<form action="islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Firma(Kişi) Adı </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="musteri_adi" required="required" class="form-control col-md-7 col-xs-12" readonly="readonly" value="<?php echo $kullanicicek['FirmaAdi'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Yetkilinin Adı <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text"  name="yetkili_adi" required="required" class="form-control col-md-7 col-xs-12" readonly="readonly" value="<?php echo $kullanicicek['YetkiliAdi'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Şehir</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  class="form-control col-md-7 col-xs-12" type="text" name="il_adi" readonly="readonly" value="<?php echo $kullanicicek['Sehir'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">E-Mail adresi<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  name="mail_adresi" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" readonly="readonly" value="<?php echo $kullanici_eposta ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Telefon 
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  name="telefon_no" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" readonly="readonly" value="<?php echo $kullanicicek['Telefon'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Cep Telefonu <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  name="cep_no" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" readonly="readonly" value="<?php echo $kullanicicek['CepTelefonu'] ?>">
								</div>
							</div>


							<hr>
							<h2>Ürün Bilgisi <small>(Servise gönderilecek ürün hakkında bilgiler)</small></h2>
							<hr>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ürün Modeli</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="model_adi"  class="form-control col-md-7 col-xs-12" type="text" readonly="readonly" value="<?php echo $satislarcek['model_adi'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Seri No<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="seri_no" type="text"  required="required" class="form-control col-md-7 col-xs-12" readonly="readonly" value="<?php echo $satislarcek['urun_serino'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Müşteri Beyanı</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea name="musteri_beyani" class="resizable_textarea form-control" placeholder="Ürün arızası hakkında bilgiler buraya girilir.." rows="8"></textarea>
								</div>
							</div>

							<input type="hidden" name="giris_tarihi" value="<?php echo date('Y-m-d') ?>">
							<input type="hidden" name="durum" value="<?php echo "beklemede" ?>">
							<input type="hidden" name="" value="" >


							<div class="ln_solid"></div>


							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<a class="btn btn-primary" href="satinaldigimurunler.php">İptal</a>
									<button type="submit" name="serviskayitbutton" class="btn btn-success">Onayla</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
		<br>
	</div>
</div>
</div>
<!-- /page content -->

<?php 

include 'footer.php';

?>