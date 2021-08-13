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
					<h2>Modeller <small>(Modellerin tümü burada gösterilir..)</small></h2>
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
					<table id="datatableresponsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Model Kategorisi</th>
								<th>Model</th>
								<th>Seçenekler</th>
								<th>id</th>
							</tr>
						</thead>
						<tbody>

							<?php 
							$bilgilerimsor=$db->prepare("SELECT * FROM model");
							$bilgilerimsor->execute();

							while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC))
							{
								?>

								<tr>
									<td><?php echo $bilgilerimcek['urun_kategorisi'] ?></td>
									<td><?php echo $bilgilerimcek['model_adi'] ?></td>
									<td align="center">
										<a class="btn btn-primary" href="modelincele.php?id=<?php echo $bilgilerimcek['model_id'] ?>">İncele</a>
										<button type="button" class="btn btn-danger sil_buton" id="sil_buton">Sil</button>
									</td>
									<td><?php echo $bilgilerimcek['model_id'] ?></td>
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
									<p>Modeli silmek istediğine emin misin? Bunun geri dönüşü yok!</p>
								</div>
								<div class="modal-footer">

									<form action="islem.php" method="POST">

										<input type="hidden" name="model_id" id="silinecek_id">
										<input type="hidden" value="<?php echo $_SESSION['kullanici_adi']; ?>" name="admin" id="admin">

										<button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
										<button name="modelsil" type="submit" class="btn btn-danger"> Evet Sil! </button>
									</form>

								</div>
							</div>
						</div>
					</div> <!-- modal --> 
				</div>
			</div>
		</div>

	</div>
</div>

<?php include 'footer.php' ?>