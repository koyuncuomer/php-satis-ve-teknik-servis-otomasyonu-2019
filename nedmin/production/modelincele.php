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

		$bilgilerimsor=$db->prepare("SELECT * FROM model where model_id=:id");
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

						<h2>Model Bilgileri <small>(Modeller hakkında bilgiler)</small></h2>
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
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Kategorisi
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="urun_kategorisi" type="text"  required="" class="form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['urun_kategorisi'] ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Model Adı 
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="model_adi" type="text"  required="" class="form-control col-md-7 col-xs-12" value="<?php echo $bilgilerimcek['model_adi'] ?>">
								</div>
							</div>


							<input type="hidden" value="<?php echo $bilgilerimcek['model_id'] ?>" name="id">
							<input type="hidden" value="<?php echo $_SESSION['kullanici_adi']; ?>" name="admin">

							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<a class="btn btn-danger" href="modeller.php">İptal</a>
									<button type="submit" name="modelguncelle" class="btn btn-success">Onayla</button>
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