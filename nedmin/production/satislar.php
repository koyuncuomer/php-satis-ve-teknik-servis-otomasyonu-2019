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

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tüm Satışlar <small>(Yapılan Satışların tümü burada gösterilir..)</small></h2>
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
					<?php 
					if ($_GET['satiskayit']=="ok") {?>
						<div class="alert alert-success">
							<strong>Başarılı!</strong> Yeni kayit başarıyla oluşturuldu!
						</div>
					<?php }
					if ($_GET['durum']=="duzok") {?>
						<div class="alert alert-success">
							<strong>Başarılı!</strong> Kayit bilgileri başarıyla değiştirildi!
						</div>
					<?php } 
					if ($_GET['durum']=="silok") {?>
						<div class="alert alert-success">
							<strong>Başarılı!</strong> Kayit başarıyla silindi!
						</div>
					<?php } ?>

					<table id="datatableresponsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Firma(Kişi) Adı</th>
								<th>Şehir</th>
								<th>Model Adı</th>
								<th>Ürün SeriNo</th>       
								<th>Satış Tarihi</th>
								<th>Seçenekler</th>
								<th>id</th>
							</tr>
						</thead>
						<tbody>

							<?php 
							$bilgilerimsor=$db->prepare("SELECT  * FROM satislar");
							$bilgilerimsor->execute();

							while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC))
							{
								?>

								<tr>
									<td><?php echo $bilgilerimcek['firma_adi'] ?></td>
									<td><?php echo $bilgilerimcek['sehir'] ?></td>
									<td><?php echo $bilgilerimcek['model_adi'] ?></td>
									<td><?php echo $bilgilerimcek['urun_serino'] ?></td>
									<td><?php echo $bilgilerimcek['satis_tarihi'] ?></td>
									<td align="center">
										<a class="btn btn-primary" href="satislarincele.php?id=<?php echo $bilgilerimcek['satis_id'] ?>">İncele</a>
										<button type="button" class="btn btn-danger sil_buton" id="sil_buton">Sil</button>
									</td>
									<td><?php echo $bilgilerimcek['satis_id'] ?></td>
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
									<p>Satış kaydını silmek istediğine emin misin? Bunun geri dönüşü yok!</p>
								</div>
								<div class="modal-footer">

									<form action="islem.php" method="POST">

										<input type="hidden" name="satis_id" id="silinecek_id">
										<input type="hidden" value="<?php echo $_SESSION['kullanici_adi']; ?>" name="admin" id="admin">

										<button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
										<button name="satissil" type="submit" class="btn btn-danger"> Evet Sil! </button>
									</form>

								</div>
							</div>
						</div>
					</div> <!-- modal --> 
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<?php include 'footer.php' ?>