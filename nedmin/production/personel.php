<?php 
include 'header.php';
include 'array.php';

if ($kullanicicek['yetki']!=1) {
	Header("Location:index.php?izinsiz");
	exit();
}
?>

<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Firma <small>Takip</small></h3>
				<br></div>
			</div>

			<div class="clearfix"></div>

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Personeller <small>(Personellerin tümü burada gösterilir..)</small></h2>
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

						<table style="width: 70%" id="datatableresponsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Personel Adı</th>
									<th>Personel Soyadı</th>
									<th>Görevi</th>
									<th>Seçenekler</th>
									<th>id</th>
								</tr>
							</thead>
							<tbody>


								<?php 
								$bilgilerimsor=$db->prepare("SELECT * FROM personel");
								$bilgilerimsor->execute();

								while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC))
								{
									?>

									<tr>
										<td><?php echo $bilgilerimcek['personel_adi'] ?></td>
										<td><?php echo $bilgilerimcek['personel_soyadi'] ?></td>
										<td><?php echo $bilgilerimcek['gorevi'] ?></td>
										<td align="center">
											<a class="btn btn-primary" href="personel_incele.php?personel_id=<?php echo $bilgilerimcek['personel_id'] ?>">İncele</a>
											<button type="button" class="btn btn-danger sil_buton" id="sil_buton">Sil</button>
											<!--<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#sil_modal" id="sil_buton">Sil</button>-->
										</td>
										<td><?php echo $bilgilerimcek['personel_id'] ?></td>
									</tr>

								<?php } ?>

							</tbody>
						</table>

						<!-- Modal -->
						<div id="sil_modal" class="modal fade" role="dialog">
							<div class="modal-dialog modal-dialog-centered">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h3 class="modal-title">Emin misin?</h3>
									</div>
									<div class="modal-body">
										<p>Personeli silmek istediğine emin misin? Bunun geri dönüşü yok!</p>
									</div>
									<div class="modal-footer">

										<form action="personelkayitislem.php" method="POST">

											<input type="hidden" name="personel_id" id="silinecek_id">
											<input type="hidden" value="<?php echo $_SESSION['kullanici_adi']; ?>" name="admin" id="admin">

											<button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
											<button name="personelsil" type="submit" class="btn btn-danger"> Evet Sil! </button>
										</form>

									</div>
								</div>
							</div>
						</div> <!-- modal --> 
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Yeni Personel Ekle <small>(Şirkete yeni personel kaydı,kullanıcı adı,şifre vb buradan yapılır..)</small></h2>
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
							<form action="personelkayitislem.php" method="POST" id="demo-form3" data-parsley-validate class="form-horizontal form-label-left">

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Personel Adı <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="personel_adi" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Personel Soyadı  <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text"  name="personel_soyadi" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Adı <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="email" name="kullanici_adi" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Şifresi<span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="password" name="kullanici_sifresi" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Görevi</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input  class="form-control col-md-7 col-xs-12" type="text" name="gorevi">
									</div>
								</div>


								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="yetki">Yetki</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<select id="yetki" name="yetki" class="form-control col-md-12 col-sm-6 col-xs-12" required="required">
											<option class="col-md-12" value="">Seçiniz</option>
											<?php
											foreach ($yetkiler as $key => $deger) {
												?>
												<option><?php echo $key." - ".$deger; ?></option>
												<?php 
											} ?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">E-mail adresi <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input name="mail_adresi" class="form-control col-md-7 col-xs-12" required="required" type="email">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Cep Telefonu <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input name="cep_no" class="form-control col-md-7 col-xs-12" required="required" type="text">
									</div>
								</div>

								<input type="hidden" value="<?php echo $_SESSION['kullanici_adi']; ?>" name="admin">

								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
										<a class="btn btn-danger" href="index.php">İptal</a>
										<button name="personelkayit" type="submit" class="btn btn-success">Onayla</button>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php include 'footer.php' ?>