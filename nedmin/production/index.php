<?php  

include 'header.php';

?>

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left" style="width: 100%;">
				<h3>Firma <small>Takip</small></h3>
				<br>
			</div>
      <!-- 
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
               <button class="btn btn-default" type="button">Go!</button>
            </span> 
          </div>
        </div>
      </div>-->
    </div>
    <div class="clearfix"></div>

    <div class="row">
    	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
    		<a href="serviskayitlari_beklemede">
    			<div class="tile-stats bg-orange">
    				<div class="icon"><i class="glyphicon glyphicon-time"></i>
    				</div>
    				<div class="count"><?php 
    				$bilgilerimsor=$db->prepare("SELECT count(durum) from yeniserviskayit where durum='beklemede' ");
    				$bilgilerimsor->execute();
    				$bilgilerimcek=$bilgilerimsor->fetchColumn();
    				echo " ".$bilgilerimcek." "; ?></div>

    				<h3 >BEKLEMEDE</h3>
    				<p >Tamire girmek için beklemede olan ürünler</p>
    			</div>
    		</a>
    	</div>

    	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
    		<a href="serviskayitlari_tamirde">
    			<div class="tile-stats bg-blue">
    				<div class="icon"><i class="fa fa-wrench "></i>
    				</div>
    				<div class="count"><?php 
    				$bilgilerimsor=$db->prepare("SELECT count(durum) from yeniserviskayit where durum='tamirde' ");
    				$bilgilerimsor->execute();
    				$bilgilerimcek=$bilgilerimsor->fetchColumn();
    				echo " ".$bilgilerimcek." "; ?></div>

    				<h3 >TAMİRDE</h3>
    				<p >Şuanda tamirde olan ürünler</p>
    			</div>
    		</a>
    	</div>

    	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
    		<a href="serviskayitlari_teslimehazir">
    			<div class="tile-stats bg-red">
    				<div class="icon "><i class="glyphicon glyphicon-thumbs-up "></i>
    				</div>
    				<div class="count "><?php 
    				$bilgilerimsor=$db->prepare("SELECT count(durum) from yeniserviskayit where durum='teslime_hazir' ");
    				$bilgilerimsor->execute();
    				$bilgilerimcek=$bilgilerimsor->fetchColumn();
    				echo " ".$bilgilerimcek." "; ?></div>

    				<h3 >TESLİMATA HAZIR</h3>
    				<p >Teslim edilmeye hazır ürünler</p>
    			</div>
    		</a>
    	</div>

    	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
    		<a href="serviskayitlari_teslimedildi">
    			<div class="tile-stats bg-green">
    				<div class="icon "><i class="fa fa-check-square-o "></i>
    				</div>
    				<div class="count"><?php 
    				$bilgilerimsor=$db->prepare("SELECT count(durum) from yeniserviskayit where durum='teslim_edildi' ");
    				$bilgilerimsor->execute();
    				$bilgilerimcek=$bilgilerimsor->fetchColumn();
    				echo " ".$bilgilerimcek." "; ?></div>

    				<h3 >TESLİM EDİLDİ</h3>
    				<p >Teslim edilen ürünler</p>
    			</div>
    		</a>
    	</div>
    </div>

    <br>

    <div class="col-md-12 col-sm-12 col-xs-12">
    	<div class="x_panel">
    		<div class="x_title">
    			<h2>Yeni Oluşturulan Son Servis Kayıtları </h2>
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
    						<th>Ad Soyad</th>
    						<th>İl</th>
    						<th>Model</th>
    						<th>Ürün SeriNo</th>
    						<th>Servise Kayıt</th>
    						<th>Müşteri Beyanı</th>
    						<th>İncele</th>
                <th>js</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $bilgilerimsor=$db->prepare("SELECT  * FROM yeniserviskayit where durum='beklemede' ");
              $bilgilerimsor->execute();

              while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC))
              {
                ?>

                <tr>
                 <td><?php echo $bilgilerimcek['musteri_adsoyad'] ?></td>
                 <td><?php echo $bilgilerimcek['il_adi'] ?></td>
                 <td><?php echo $bilgilerimcek['model_adi'] ?></td>
                 <td><?php echo $bilgilerimcek['seri_no'] ?></td>
                 <td><?php echo $bilgilerimcek['giris_tarihi'] ?></td>
                 <td><?php echo $bilgilerimcek['musteri_beyani'] ?></td>
                 <td><a class="btn btn-primary" href="serviskayitlari_incele.php?id=<?php echo $bilgilerimcek['id'] ?>">İncele</a></td>
                 <td>tablo son sütün gösterilmiyor js</td>
               </tr>

             <?php } ?>

           </tbody>
         </table>
       </div>
     </div>
   </div>
 </div>
</div>

<!-- /page content -->

<?php 

include 'footer.php';

?>