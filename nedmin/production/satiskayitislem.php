<?php 
ob_start(); 
session_start();
require_once 'baglan.php';
include 'logtutma.php';

if(isset($_POST['satiskayitbutton'])){
	$firmasehir  =  explode('/', $_POST['firma_sehir']);
	
	$bilgilerimsor=$db->prepare("SELECT * FROM alicilar where FirmaAdi=:FirmaAdi and Sehir=:Sehir");
	$bilgilerimsor->execute(array(
		'FirmaAdi'=>trim($firmasehir[0]),
		'Sehir'=>trim($firmasehir[1])
	));
	$bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC);
	$Eposta=$bilgilerimcek['Eposta'];

	$kaydet=$db->prepare("INSERT into satislar set 
		firma_adi=:firma_adi,
		urun_serino=:urun_serino,
		model_adi=:model_adi,
		sehir=:sehir,
		satis_tarihi=:satis_tarihi,
		Eposta=:Eposta
		");

	$insert=$kaydet->execute(array(

		'firma_adi'=>trim($firmasehir[0]),
		'urun_serino'=>$_POST['urun_serino'],
		'model_adi'=>$_POST['model_adi'],
		'sehir'=>trim($firmasehir[1]),
		'satis_tarihi'=>$_POST['satis_tarihi'],
		'Eposta'=>$Eposta,
	));


	if ($insert){
		$log=logDBKayit("SATIŞ KAYIT",$_POST['admin'],$_POST['firma_sehir']." müşteriye, ".$_POST['urun_serino']." S.Nolu cihaz satılmıştır.");
		Header("Location:satislar.php?satiskayit=ok&$log"); exit;
	}
	else{
		Header("Location:satislar.php?satiskayit=no"); exit;
	}
}

?>