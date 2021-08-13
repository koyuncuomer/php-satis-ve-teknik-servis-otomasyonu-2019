<?php 
include 'header.php';

if ($kullanicicek['yetki']>2) {
	Header("Location:index.php?izinsiz");
	exit();
}
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
					<h2>LOG KAYITLARI <small>(Log kayıtları burada gösterilir..)</small></h2>
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

					<table id="log_datatableresponsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>İşlem Türü</th>
								<th>İşlemi Yapan</th>
								<th>İşlem Detayı</th>
								<th>İşlem Tarihi</th>
								<th>IP Adresi</th>
							</tr>
						</thead>
						<tbody>

							<?php 
							$bilgilerimsor=$db->prepare("SELECT * FROM logkayit ORDER BY logId");
							$bilgilerimsor->execute();

							while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC))
							{
								?>

								<tr>
									<td><?php echo $bilgilerimcek['logTur']; ?></td>
									<td><?php echo $bilgilerimcek['logSahip']; ?></td>
									<td><?php echo $bilgilerimcek['logBilgi']; ?></td>
									<td><?php echo $bilgilerimcek['logTarih']; ?></td>
									<td><?php echo $bilgilerimcek['logIP']; ?></td>
								</tr>

							<?php } ?>

						</tbody>
					</table>

				</div>
			</div>
		</div>

		<div class="clearfix"></div>

	</div>
</div>

<?php include 'footer.php' ?>