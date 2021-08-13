<?php  
include 'header.php';
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

		<?php 

		$bilgilerimsor=$db->prepare("SELECT * FROM satislar where satis_id=:id");
		$bilgilerimsor->execute(array(
			'id'=>$_GET['id']
		));

		$bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC);

		?>

		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">

						<h2>Satışlar <small>(Yapılan satışlar hakkında bilgiler)</small></h2>
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
						<p style="color: red">Bu tabloda düzenlediğiniz bilgiler diğer tabloları etkilemez. Örneğin satılan bir ürünün seri no değiştirirseniz ve o ürünün daha önce servis kaydı varsa o kayıttaki bilgiler etkilenmez.</p>
					</div>
					<div class="x_content">
						<br />
						<form action="islem.php" method="POST"  data-parsley-validate class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<label>
										<input id="checkboxsatisinc" name="checkbox" type="checkbox"> Firma Adı ve Şehir de düzenlensin mi?
									</label>             
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Firma(Kişi) Adı
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="satisfirma" name="firma_adi" readonly="readonly" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['firma_adi'] ?>"> 
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Şehir</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input class="form-control col-md-7 col-xs-12" type="text" id="satissehir" name="sehir" readonly="readonly" value="<?php echo $bilgilerimcek['sehir'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Model Adı</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="model_adi" id="satismodelad" class="form-control col-md-7 col-xs-12" required="required" type="text" readonly="readonly" value="<?php echo $bilgilerimcek['model_adi'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Ürün Seri No
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="serino" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $bilgilerimcek['urun_serino'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Satış Tarihi 
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="satis_tarih" name="satis_tarihi" class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo $bilgilerimcek['satis_tarihi'] ?>">
								</div>
							</div>

							<input type="hidden" value="<?php echo $bilgilerimcek['satis_id'] ?>" name="id">

							<input type="hidden" value="<?php echo $_SESSION['kullanici_adi']; ?>" name="admin"> 

							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<a class="btn btn-danger" href="satislar.php">İptal</a>
									<button type="submit" name="satisguncelle" class="btn btn-success">Onayla</button>
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