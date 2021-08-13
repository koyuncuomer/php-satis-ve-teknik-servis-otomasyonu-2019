<?php 

require_once 'baglan.php';
include 'logtutma.php';

if(isset($_POST['musterikayitbutton']))
{
	if ($_POST['Eposta'] == "" || $_POST['Eposta'] == NULL) {
		$bilgisor=$db->prepare("SELECT AUTO_INCREMENT AS 'last_incr' FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'alicilar'");
		$bilgisor->execute();
		$bilgicek=$bilgisor->fetch(PDO::FETCH_ASSOC);

		$temp_mail = $bilgicek["last_incr"]."_".$_POST['YetkiliAdi'].preg_replace('/[^.%0-9]/', '', $_POST['Sehir'])."@maileklenecek";

		$temp_mail = mb_strtolower($temp_mail);

		$bul = array("ı","ü","ğ","ş","ö","ç"," ");
		$degistir = array("i", "u", "g", "s","o","c","");

		$Eposta = str_replace($bul, $degistir, $temp_mail);
	}else{
		$Eposta = $_POST['Eposta'];
	}

	$kaydet=$db->prepare("INSERT into alicilar set 
		FirmaAdi=:FirmaAdi,
		YetkiliAdi=:YetkiliAdi,
		Adres=:Adres,
		Sehir=:Sehir,
		Telefon=:Telefon,
		Faks=:Faks,
		CepTelefonu=:CepTelefonu,
		Eposta=:Eposta,
		vergidairesi=:VergiDaire,
		vergino=:VergiNo
		");

	$insert=$kaydet->execute(array(
		'FirmaAdi'=>$_POST['FirmaAdi'],
		'YetkiliAdi'=>$_POST['YetkiliAdi'],
		'Adres'=>$_POST['Adres'],
 		'Sehir'=>$_POST['Sehir'], //şehir  53 - Rize  şeklinde geliyor 
 		'Telefon'=>$_POST['Telefon'],
 		'Faks'=>$_POST['Faks'],
 		'CepTelefonu'=>$_POST['CepTelefonu'],
 		'Eposta'=>$Eposta,
 		'VergiDaire'=>$_POST['VergiDaire'],
 		'VergiNo'=>$_POST['VergiNo']
 	));

 	$firmaadil=$_POST['FirmaAdi']." / ".preg_replace('/[^.%0-9]/', '', $_POST['Sehir']); //sadece il kodu al

 	if ($insert) 
 	{
 		$log=logDBKayit("MÜŞTERİ KAYIT",$_POST['admin'],$firmaadil." yeni müşteri kaydedildi.");
 		Header("Location:musteriler.php?durum=ok&$log"); exit;
 	}

 	else
 	{
 		Header("Location:musteriler.php?durum=no"); exit;
 	}

 }

?>