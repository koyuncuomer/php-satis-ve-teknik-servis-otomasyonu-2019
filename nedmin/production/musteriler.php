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

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tüm Müşteriler <small>(Müşterilerin tümü burada gösterilir..)</small></h2>
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
					if ($_GET['durum']=="duzok") {
						if ($_GET['satis']=="duzok" && $_GET['servis']=="duzok") {
							$mesaj="Müşterinin bilgileri başarıyla değiştirildi! Ayrıca Servisler ve Satislar tablosundaki bilgileri yeni kayitlara göre düzenlendi.";
						} else{ $mesaj="Müşterinin bilgileri başarıyla değiştirildi!"; }
						?>
						<div class="alert alert-success">
							<strong>Başarılı!</strong> <?php echo $mesaj; ?>
						</div>
					<?php } elseif ($_GET['durum']=="duzno") {?>
						<div class="alert alert-danger">
							<strong>Hata!</strong> Kayitlar değiştirilemedi!
						</div>
					<?php } 
					if ($_GET['durum']=="ok") {?>
						<div class="alert alert-success">
							<strong>Başarılı!</strong> Yeni kayit başarıyla oluşturuldu!
						</div>
					<?php } 
					if ($_GET['durum']=="silok") {?>
						<div class="alert alert-success">
							<strong>Başarılı!</strong> Kayit başarıyla silindi!
						</div>
					<?php }
					?>

					<table id="datatableresponsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Firma(Kişi) Adı</th>
								<th>Yetkilinin Adı</th>
								<th>Şehir</th>
								<th>Adres</th>
								<th>E-mail</th>
								<th>Cep Telefonu</th>
								<th>Telefon</th> 
								<th>Faks</th>
								<th>Vergi Dairesi</th>
								<th>Vergi No</th>
								<th>Seçenekler</th>
								<th>id</th>
							</tr>
						</thead>

						<tbody>

							<?php 
							$bilgilerimsor=$db->prepare("SELECT  * FROM alicilar");
							$bilgilerimsor->execute();

							while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC))
							{
								?>

								<tr>

									<td><?php echo $bilgilerimcek['FirmaAdi'] ?></td>
									<td><?php echo $bilgilerimcek['YetkiliAdi'] ?></td>
									<td><?php echo $bilgilerimcek['Sehir'] ?></td>
									<td><?php echo $bilgilerimcek['Adres'] ?></td>
									<td><?php echo $bilgilerimcek['Eposta'] ?></td>
									<td><?php echo $bilgilerimcek['CepTelefonu'] ?></td>
									<td><?php echo $bilgilerimcek['Telefon'] ?></td>
									<td><?php echo $bilgilerimcek['Faks'] ?></td>
									<td><?php echo $bilgilerimcek['vergidairesi'] ?></td>
									<td><?php echo $bilgilerimcek['vergino'] ?></td>
									<td align="center">
										<a class="btn btn-primary" href="musteriincele.php?id=<?php echo $bilgilerimcek['AliciId'] ?>">İncele</a>
										<button type="button" class="btn btn-danger sil_buton" id="sil_buton">Sil</button>
										<!--<button type="button" class="btn btn-danger sil_buton" id="sil_buton" data-toggle="modal" data-target="#sil_modal">Sil</button>-->
									</td>
									<td><?php echo $bilgilerimcek['AliciId'] ?></td>
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
									<p>Müşteriyi silmek istediğine emin misin? Bunun geri dönüşü yok!</p>
								</div>
								<div class="modal-footer">

									<form action="islem.php" method="POST">

										<input type="hidden" name="musteri_id" id="silinecek_id">
										<input type="hidden" value="<?php echo $_SESSION['kullanici_adi']; ?>" name="admin" id="admin">

										<button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
										<button name="musterisil" type="submit" class="btn btn-danger"> Evet Sil! </button>
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

<?php include 'footer.php'; ?>