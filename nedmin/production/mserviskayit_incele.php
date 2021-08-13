<?php 

include 'musterisayfasiheader.php'
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

		$bilgilerimsor=$db->prepare("SELECT * FROM yeniserviskayit where id=:id");
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
						<h2>Servis Kaydı İncelemesi<small>(Oluşturduğunuz servis kaydı.)</small></h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form data-parsley-validate class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Model Adı
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="model_adi" type="text"   required="required" class="form-control col-md-7 col-xs-12" readonly="readonly" value="<?php echo $bilgilerimcek['model_adi'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Seri No
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="seri_no" type="text"  required="required" class="form-control col-md-7 col-xs-12" readonly="readonly" value="<?php echo $bilgilerimcek['seri_no'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Müşteri Beyanı</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea name="musteri_beyani" readonly="readonly" class="resizable_textarea form-control" ><?php echo $bilgilerimcek['musteri_beyani'] ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Açıklama</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea name="aciklama" readonly="readonly" class="resizable_textarea form-control" ><?php echo $bilgilerimcek['aciklama'] ?></textarea>
								</div>
							</div>


							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Durum</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="tutar" type="text" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['durum'] ?>">
								</div>
							</div> 

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tutar</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="tutar" type="text" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['tutar'] ?>">
								</div>
							</div> 

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Servis Kayıt Tarihi 
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="giris_tarihi" readonly="readonly" type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['giris_tarihi'] ?>">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<a class="btn btn-danger" href="musteriserviskayitlarim.php">Geri</a>
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