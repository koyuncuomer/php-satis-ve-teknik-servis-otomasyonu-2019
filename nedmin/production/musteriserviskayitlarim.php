<?php 
include 'musterisayfasiheader.php'
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
					<h2>Servis Kayıtları <small>(Servis kayıtlarının tümü burada gösterilir..)</small></h2>
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
								<th>Ürün Modeli</th>
								<th>Ürün Seri No</th>
								<th>Açıklama</th>      
								<th>Tutar</th>
								<th>Durum</th>
								<th>Müşteri Beyanı</th>
								<th>İncele</th>
							</tr>
						</thead>
						<tbody>

							<?php 
							$bilgilerimsor=$db->prepare("SELECT * FROM yeniserviskayit where mail_adresi=:eposta");
							$bilgilerimsor->execute(array(
								'eposta'=> $_SESSION['kullanici_eposta']
							));

							while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC))
							{
								?>

								<tr>
									<td><?php echo $bilgilerimcek['model_adi'] ?></td>
									<td><?php echo $bilgilerimcek['seri_no'] ?></td>
									<td><?php echo $bilgilerimcek['aciklama'] ?></td>
									<td><?php echo $bilgilerimcek['tutar'] ?></td>
									<td><?php echo $bilgilerimcek['durum'] ?></td>
									<td><?php echo $bilgilerimcek['musteri_beyani'] ?></td>
									<td><a class="btn btn-primary" href="mserviskayit_incele.php?id=<?php echo $bilgilerimcek['id'] ?>">İncele</a></td>

								</tr>

							<?php } ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php' ?>