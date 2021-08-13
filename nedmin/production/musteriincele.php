<?php  

include 'header.php';
include "array.php";
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

		$bilgilerimsor=$db->prepare("SELECT * FROM alicilar where AliciId=:id");
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

						<h2>Müşteri Bilgileri <small>(Servise alınan ürün sahibi hakkında bilgiler)</small></h2>
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
						<form action="islem.php" method="POST"  data-parsley-validate class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Firma Adı
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="firma_adi"  required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['FirmaAdi'] ?>"> 
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Yetkili Adı</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  class="form-control col-md-7 col-xs-12" type="text" name="yetkili_adi" value="<?php echo $bilgilerimcek['YetkiliAdi'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="sehir">Şehir</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="sehir" name="sehir" class="form-control col-md-12 col-sm-6 col-xs-12">
										<option class="col-md-12" value="<?php echo $bilgilerimcek['Sehir']?>">Şuan: <?php echo $bilgilerimcek['Sehir']?></option>
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
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Adres
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="adres" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $bilgilerimcek['Adres'] ?>">
								</div>
							</div>


							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">E-Posta
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="eposta" type="email" class="form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['Eposta'] ?>" readonly="">
									<a href="tumkayitlariesitle.php?eposta=<?php echo $bilgilerimcek['Eposta'] ?>"><span style="float: right; color: red">E-posta değiştirmek için tıklayın!</span></a>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Cep Telefonu
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  name="cep_no" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $bilgilerimcek['CepTelefonu'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Telefon 
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  name="telefon_no" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $bilgilerimcek['Telefon'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Faks 
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  name="faks_no" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $bilgilerimcek['Faks'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vergi Dairesi
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="vergidairesi" type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['vergidairesi'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vergi No 
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="vergino" type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['vergino'] ?>">
								</div>
							</div>


							<input type="hidden" value="<?php echo $bilgilerimcek['AliciId'] ?>" name="id">

							<input type="hidden" value="<?php echo $_SESSION['kullanici_adi']; ?>" name="admin"> 

							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<a class="btn btn-danger" href="musteriler.php">İptal</a>
									<button type="submit" name="alicilarguncelle" class="btn btn-success">Onayla</button>
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