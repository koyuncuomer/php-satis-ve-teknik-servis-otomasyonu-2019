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
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Firma(Kişi) Adı<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="musteri_adi"  required="required" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['musteri_adsoyad'] ?>"> 
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yetkili Adı<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="yetkili_adi"  required="required" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['yetkili_adsoyad'] ?>"> 
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Şehir</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input class="form-control col-md-7 col-xs-12" type="text" name="il_adi" readonly="readonly" value="<?php echo $bilgilerimcek['il_adi'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">E-mail Adresi<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  name="mail_adresi" class="date-picker form-control col-md-7 col-xs-12" required="required" type="email" readonly="readonly" value="<?php echo $bilgilerimcek['mail_adresi'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Cep Telefonu<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  name="cep_no" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" readonly="readonly" value="<?php echo $bilgilerimcek['cep_no'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Telefon</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  name="telefon_no" class="date-picker form-control col-md-7 col-xs-12" type="text" readonly="readonly" value="<?php echo $bilgilerimcek['telefon_no'] ?>">
								</div>
							</div>

							<hr>
							<h2>Ürün Bilgisi <small>(Servise alınan ürün hakkında bilgiler)</small></h2>
							<hr>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Model Adı<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="model_adi" type="text"   required="required" class="form-control col-md-7 col-xs-12" readonly="readonly" value="<?php echo $bilgilerimcek['model_adi'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Seri No<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="seri_no" type="text"  required="required" class="form-control col-md-7 col-xs-12" readonly="readonly" value="<?php echo $bilgilerimcek['seri_no'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Müşteri Beyanı</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea name="musteri_beyani" class="resizable_textarea form-control" ><?php echo $bilgilerimcek['musteri_beyani'] ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Açıklama</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea name="aciklama" class="resizable_textarea form-control" ><?php echo $bilgilerimcek['aciklama'] ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Giriş Tarihi 
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="satis_tarih" name="giris_tarihi" type="text" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['giris_tarihi'] ?>">
								</div>
							</div>


							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tutar</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="tutar" type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['tutar'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="durum">Durum</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select name="durum" id="duruminc" class="form-control col-md-12 col-sm-6 col-xs-12" required="required">
										<option class="col-md-12" value="<?php echo $bilgilerimcek['durum']?>">Şuan <?php echo $bilgilerimcek['durum']?></option>
										<option value="beklemede" >Beklemede</option>
										<option value="tamirde" >Tamirde</option>
										<option value="teslime_hazir" >Teslime Hazır</option>
										<option value="teslim_edildi" >Teslim Edildi</option>
									</select>
								</div>
							</div>

							<input type="hidden" value="<?php echo $bilgilerimcek['id'] ?>" name="id">

							<input type="hidden" value="<?php echo $_SESSION['kullanici_adi']; ?>" name="admin"> 

							<div class="ln_solid"></div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<label>
										<input id="checkboxinc" name="checkbox" type="checkbox"> Yapılan Değişiklikler kullanıcıya e-posta atılarak bildirilsin mi?
									</label>             
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<a class="btn btn-danger" href="serviskayitlari.php">İptal</a>
									<button type="submit" name="updatebutton" class="btn btn-success">Onayla</button>
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

<?php include 'footer.php'; ?>