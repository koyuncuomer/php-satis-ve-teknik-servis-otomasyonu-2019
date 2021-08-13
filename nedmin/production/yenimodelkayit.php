<?php 

include 'header.php'
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
						<h2>Mevcut Kategoriye Yeni Model Ekle<small>(Yeni Model Kaydı Buradan Yapılır..)</small></h2>
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
						<form action="modelkayitislem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="heard">Mevcut Kategoriler</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select name="urun_kategorisi" class="form-control col-md-12 col-sm-6 col-xs-12" required="required">
										<option class="col-md-12" value="">Seçiniz</option>
										<?php 
										$bilgilerimsor=$db->prepare("SELECT * FROM model group by urun_kategorisi");
										$bilgilerimsor->execute();

										while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC))
										{
											?>
											<option><?php echo $bilgilerimcek['urun_kategorisi'] ?></option>
											<?php 
										} ?>
									</select>
								</div>
							</div>


							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Yeni Model</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text"  name="model_adi" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<input type="hidden" value="<?php echo $_SESSION['kullanici_adi']; ?>" name="admin">

							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<a class="btn btn-danger" href="modeller.php">İptal</a>
									<button type="submit" name="modelkayitbutton" class="btn btn-success">Onayla</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>
		<br>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Yeni Kategori ile Model Ekle<small>(Yeni Kategori ve Model Kaydı Buradan Yapılır..)</small></h2>
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
						<form action="modelkayitislem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Yeni Kategori</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="urun_kategorisi" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Yeni Model</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="model_adi" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<input type="hidden" value="<?php echo $_SESSION['kullanici_adi']; ?>" name="admin">

							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<a class="btn btn-danger" href="modeller.php">İptal</a>
									<button type="submit" name="kategorikayitbutton" class="btn btn-success">Onayla</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


</div>
</div>


<?php include 'footer.php' ?>