<?php  
ob_start(); 
session_start();
require_once 'baglan.php';
//GET METODU İLE islem.phpden gelen email ile kayıtlı içerikler güncelleniyor
if (isset($_POST['kayitlaresitle']) || isset($_GET['email'])) {

	if (isset($_GET['email'])) {
		$alici_mail=$_GET['email'];
	} elseif (isset($_POST['kayitlaresitle'])) {
		$alici_mail=$_POST['alici_mail'];
	}

	$bilgilerimsor=$db->prepare("SELECT * FROM alicilar where Eposta=:eposta");
	$bilgilerimsor->execute(array(
		'eposta'=>$alici_mail
	));

	$bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC);
	$firmaadi=$bilgilerimcek['FirmaAdi'];
	$sehir=$bilgilerimcek['Sehir'];
	$telefon=$bilgilerimcek['Telefon'];
	$ceptelefon=$bilgilerimcek['CepTelefonu'];
	$yetkiliadi=$bilgilerimcek['YetkiliAdi'];

	$satiskaydet=$db->prepare("UPDATE satislar set 
		firma_adi=:firma_adi, 
		sehir=:sehir
		where Eposta=:Eposta
		");

	$satisinsert=$satiskaydet->execute(array(
		'firma_adi'=>$firmaadi,
		'sehir'=>$sehir,
		'Eposta'=>$alici_mail
	));

	if ($satisinsert) {
		$satis="satis=duzok";
	}
	else{
		$satis="satis=duzno";
	}
	
	$serviskaydet=$db->prepare("UPDATE yeniserviskayit set 
		musteri_adsoyad=:musteri_adi,
		yetkili_adsoyad=:yetkili_adi,
		il_adi=:il_adi,
		telefon_no=:telefon_no,
		cep_no=:cep_no
		where mail_adresi=:mail_adresi
		");

	$servisinsert=$serviskaydet->execute(array(
		'musteri_adi'=>$firmaadi,
		'yetkili_adi'=>$yetkiliadi,
		'il_adi'=>$sehir,
		'telefon_no'=>$telefon,
		'cep_no'=>$ceptelefon,
		'mail_adresi'=>$alici_mail
	));

	if ($servisinsert) {
		if ($_GET['kont'] == "ok") { //GET kont islem.phpden geliyor
			Header("Location: musteriler.php?durum=duzok&servis=duzok&$satis"); exit;
		}
		else{
			Header("Location: tumkayitlariesitle.php?servis=duzok&$satis"); exit();
		} 
	}
	else{
		Header("Location: tumkayitlariesitle.php?servis=duzno&$satis"); exit;
	}
}

if (isset($_POST['emaildegis'])) {

	$eski_mail=$_POST['eski_mail'];
	$yeni_mail=$_POST['yeni_mail'];

	$alicikaydet=$db->prepare("UPDATE alicilar set 
		Eposta=:yeni_mail
		where Eposta=:Eposta
		");

	$alicikaydet=$alicikaydet->execute(array(
		'yeni_mail'=>$yeni_mail,
		'Eposta'=>$eski_mail
	));

	if ($alicikaydet) {
		$alici="alicie=duzok";
	}
	else{
		$alici="alicie=duzno";
	}

	$satiskaydet=$db->prepare("UPDATE satislar set 
		Eposta=:yeni_mail
		where Eposta=:Eposta
		");

	$satisinsert=$satiskaydet->execute(array(
		'yeni_mail'=>$yeni_mail,
		'Eposta'=>$eski_mail
	));

	if ($satisinsert) {
		$satis="satise=duzok";
	}
	else{
		$satis="satise=duzno";
	}
	
	$serviskaydet=$db->prepare("UPDATE yeniserviskayit set 
		mail_adresi=:yeni_mail
		where mail_adresi=:mail_adresi
		");

	$servisinsert=$serviskaydet->execute(array(
		'yeni_mail'=>$yeni_mail,
		'mail_adresi'=>$eski_mail
	));

	if ($servisinsert) {
		Header("Location: tumkayitlariesitle.php?servise=duzok&$satis&$alici"); exit();
	}
	else{
		Header("Location: tumkayitlariesitle.php?servise=duzno&$satis&$alici"); exit;
	}
}

?>