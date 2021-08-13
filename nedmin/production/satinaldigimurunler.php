<?php 
include 'musterisayfasiheader.php';
date_default_timezone_set('Europe/Istanbul');
$bugun = date_create(date('Y-m-d'));
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
					<h2>Aldığım Ürünler <small>(Satın aldığınız ürünlerin tümü burada gösterilir..)</small></h2>
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
								<th>Satış Tarihi</th>
								<th>Garanti Durumu</th>
								<th>Seçenekler</th>
							</tr>
						</thead>
						<tbody>

							<?php 
							$bilgilerimsor=$db->prepare("SELECT * FROM satislar where Eposta=:eposta ");
							$bilgilerimsor->execute(array(
								'eposta'=> $_SESSION['kullanici_eposta']
							));

							while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC))
							{
								?>
								<tr>
									<td><?php echo $bilgilerimcek['model_adi'] ?></td>
									<td><?php echo $bilgilerimcek['urun_serino'] ?></td>
									<td><?php echo $bilgilerimcek['satis_tarihi'] ?></td>
									<td>
										<?php 
										$interval = date_diff($bugun, date_create($bilgilerimcek['satis_tarihi']));//garanti süresi hesaplıyoruz 
										if ($interval->y > 0) {
											$kalanay = 24-((($interval->y)*12)+$interval->m);
											if ($kalanay <= 0) {
												echo "Garanti Bitti";
											}
											elseif ($kalanay==1) {
                  			echo 30-($interval->d)." gün kaldı."; //31 çeken aylarda sıkıntı oluyor ayrı fonksiyon yazmalı
                  		}
                  		else{
                  			echo $kalanay." ay kaldı.";
                  		}
                  	}
                  	else{
                  		$kalanay = 24-($interval->m);
                  		echo $kalanay." ay kaldı.";
                  	} ?>
                  </td>
                  <td align="center">
                  	<?php 
                  	if ($kalanay>0) {
                  		$servissor=$db->prepare("SELECT * from yeniserviskayit where seri_no=:serino and durum!='teslim_edildi'");
                  		$servissor->execute(array(
                  			'serino'=> $bilgilerimcek['urun_serino']
                  		));
                  		$serviskontrol=$servissor->rowcount();
                  		if ($serviskontrol==1) {
                  			echo "Ürün şuan serviste.";
                  		}
                  		else{ ?>
                  			<a class="btn btn-primary" href="musteriserviskayit.php?id=<?php echo $bilgilerimcek['satis_id'] ?>">Servise Gönder</a>
                  			<?php
                  		}
                  	}
                  	else{
                  		echo "Garanti Bitti.";
                  	}
                  	?>
                  </td>
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