<?php 
ob_start();
require_once 'baglan.php';
include '../mailphp/mailgonder.php';
include 'logtutma.php';

if(isset($_POST['personelkayit']))
{
	$kaydet=$db->prepare("INSERT into personel set 
		personel_adi=:personel_adi,
		personel_soyadi=:personel_soyadi,
		kullanici_adi=:kullanici_adi,
		kullanici_sifresi=:kullanici_sifresi,
		gorevi=:gorevi,
		yetki=:yetki,
		mail_adresi=:mail_adresi,
		cep_no=:cep_no
		");

	$insert=$kaydet->execute(array(
		'personel_adi'=>$_POST['personel_adi'],
		'personel_soyadi'=>$_POST['personel_soyadi'],
		'kullanici_adi'=>$_POST['kullanici_adi'],
		'kullanici_sifresi'=>md5($_POST['kullanici_sifresi']),
		'gorevi'=>$_POST['gorevi'],
		'yetki'=>$_POST['yetki'],
		'mail_adresi'=>$_POST['mail_adresi'],
		'cep_no'=>$_POST['cep_no'],
	));

	if ($insert) 
	{
		$log=logDBKayit("PERSONEL KAYIT",$_POST['admin'],$_POST['kullanici_adi']." adlı yeni personel eklendi.");
		Header("Location: personel.php?durum=ok&$log"); exit;
	}
	else
	{
		Header("Location: personel.php?durum=no"); exit;
	}
}


if(isset($_POST['personelupdate']))
{
	$personel_id=$_POST['personel_id'];
	$kaydet=$db->prepare("UPDATE personel set 
		personel_adi=:personel_adi,
		personel_soyadi=:personel_soyadi,
		kullanici_adi=:kullanici_adi,
		gorevi=:gorevi,
		yetki=:yetki,
		mail_adresi=:mail_adresi,
		cep_no=:cep_no
		where personel_id=:personel_id
		");

	$insert=$kaydet->execute(array(
		'personel_adi'=>$_POST['personel_adi'],
		'personel_soyadi'=>$_POST['personel_soyadi'],
		'kullanici_adi'=>$_POST['kullanici_adi'],
		'gorevi'=>$_POST['gorevi'],
		'yetki'=>$_POST['yetki'],
		'mail_adresi'=>$_POST['mail_adresi'],
		'cep_no'=>$_POST['cep_no'],
		'personel_id'=>$personel_id
	));

	if ($insert) 
	{
		$log=logDBKayit("PERSONEL GÜNCELLEME",$_POST['admin'],$personel_id." ID'li personelin bilgileri güncellendi. ".$_POST['kullanici_adi']);
		Header("Location: personel_incele.php?durum=gunok&personel_id=$personel_id");
		exit;
	}
	else
	{
		Header("Location: personel_incele.php?durum=gunno&personel_id=$personel_id");
		exit;
	}
}

//personel sil butonu
if (isset($_POST['personelsil'])) {
	$bilgisor=$db->prepare("SELECT * FROM personel where personel_id=:id");
	$bilgisor->execute(array(
		'id'=>$_POST['personel_id']
	));
	$bilgicek=$bilgisor->fetch(PDO::FETCH_ASSOC);

	$sil=$db->prepare("DELETE from personel where personel_id=:id");
	$kontrol=$sil->execute(array(
		'id'=>$_POST['personel_id']
	));
	if ($kontrol) 
	{
		$logbilgi=$_POST['personel_id']." ID'li ".$bilgicek['personel_adi']." ".$bilgicek['personel_soyadi']." personel silindi.";
		$log=logDBKayit("PERSONEL SİLME",$_POST['admin'],$logbilgi);
		Header("Location: personel.php?durum=silok&$log"); exit;
	}
	else
	{
		Header("Location: personel.php?durum=silno"); exit;
	}
}

if (isset($_POST['sifreguncelle'])) {

	$kullanici_passwordone=trim($_POST['kullanici_passwordone']);
	$kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']);
	$personel_id=$_POST['personel_id'];

	if ($kullanici_passwordone==$kullanici_passwordtwo) {

		$password=md5($kullanici_passwordone);

		$kullanicikaydet=$db->prepare("UPDATE personel SET
			kullanici_sifresi=:kullanici_password
			WHERE personel_id={$_POST['personel_id']}"
		);

		$insert=$kullanicikaydet->execute(array(
			'kullanici_password' => $password
		));

		if ($insert) {
			$log=logDBKayit("ADMİN ŞİFRE DEĞİŞTİRME",$_POST['admin'],$_POST['kullaniciadi']." personelin şifre değiştirildi.");
			header("Location: personel_incele.php?personel_id=$personel_id&durum=sifredegisti&$log");
			exit();
		} 
		else {
			header("Location: personel_incele.php?personel_id=$personel_id&durum=no");
			exit();
		}

	} 
	else {
		header("Location: personel_incele.php?personel_id=$personel_id&durum=sifreleruyusmuyor");
		exit;
	}
}


?>