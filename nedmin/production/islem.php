<?php 
ob_start(); 
session_start();

require_once 'baglan.php';
include '../mailphp/mailgonder.php';
include 'logtutma.php';

if(isset($_POST['serviskayitbutton']))
{
	$kaydet=$db->prepare("INSERT into yeniserviskayit set 
		musteri_adsoyad=:musteri_adi,
		yetkili_adsoyad=:yetkili_adi,
		il_adi=:il_adi,
		mail_adresi=:mail_adresi,
		telefon_no=:telefon_no,
		cep_no=:cep_no,
		seri_no=:seri_no,
		model_adi=:model_adi,
		musteri_beyani=:musteri_beyani,
		giris_tarihi=:giris_tarihi,
		durum=:durum"
	);

	$insert=$kaydet->execute(array(
		'musteri_adi'=>$_POST['musteri_adi'],
		'yetkili_adi'=>$_POST['yetkili_adi'],
		'il_adi'=>$_POST['il_adi'],
		'mail_adresi'=>$_POST['mail_adresi'],
		'telefon_no'=>$_POST['telefon_no'],
		'cep_no'=>$_POST['cep_no'],
		'seri_no'=>$_POST['seri_no'],
		'model_adi'=>$_POST['model_adi'],
		'musteri_beyani'=>$_POST['musteri_beyani'],
		'giris_tarihi'=>$_POST['giris_tarihi'],
		'durum'=>$_POST['durum'],
	));

	if ($insert) 
	{
		$log=logDBKayit("SERVİS KAYIT",$_POST['mail_adresi'],$_POST['seri_no']." S.No cihaz servise kaydedildi.");
		Header("Location: musteriserviskayitlarim.php?durum=kayitok&$log"); exit;
	}
	else
	{
		Header("Location: musteriserviskayitlarim.php?durum=kayitno"); exit;
	}
}

//Servis kayitlari güncelleme
if(isset($_POST['updatebutton']))
{
	$kaydet=$db->prepare("UPDATE yeniserviskayit set 
		musteri_adsoyad=:musteri_adi,
		yetkili_adsoyad=:yetkili_adi,
		il_adi=:il_adi,
		mail_adresi=:mail_adresi,
		telefon_no=:telefon_no,
		cep_no=:cep_no,
		seri_no=:seri_no,
		model_adi=:model_adi,
		musteri_beyani=:musteri_beyani,
		aciklama=:aciklama,
		giris_tarihi=:giris_tarihi,
		teslim_tarihi=:teslim_tarihi,
		tutar=:tutar,
		durum=:durum
		where id={$_POST['id']}
		");

	$insert=$kaydet->execute(array(
		'musteri_adi'=>$_POST['musteri_adi'],
		'yetkili_adi'=>$_POST['yetkili_adi'],
		'il_adi'=>$_POST['il_adi'],
		'mail_adresi'=>$_POST['mail_adresi'],
		'telefon_no'=>$_POST['telefon_no'],
		'cep_no'=>$_POST['cep_no'],
		'seri_no'=>$_POST['seri_no'],
		'model_adi'=>$_POST['model_adi'],
		'musteri_beyani'=>$_POST['musteri_beyani'],
		'aciklama'=>$_POST['aciklama'],
		'giris_tarihi'=>$_POST['giris_tarihi'],
		'teslim_tarihi'=>$_POST['teslim_tarihi'],
		'tutar'=>$_POST['tutar'],
		'durum'=>$_POST['durum'],
	));

	if ($insert) 
	{
		if(!empty($_POST['checkbox'])) { //mail gonder seçili ise
			$mesaj=mailgonder("servis",$_POST['mail_adresi'],$_POST['yetkili_adi'],$_POST['durum'],$_POST['seri_no']);
		}
		$logbilgi=$_POST['musteri_adi']."/".$_POST['il_adi']." müşterinin, ".$_POST['seri_no']." S.Nolu cihazının ".$_POST['id']." ID'li servis kaydı değişmiştir: ".$_POST['durum'];
		$log=logDBKayit("SERVİS GÜNCELLEME",$_POST['admin'],$logbilgi);
		Header("Location: serviskayitlari.php?durum=duzok&$mesaj&$log"); exit;
	}
	else
	{
		Header("Location: serviskayitlari.php?durum=duzno"); exit;
	}
}


//Alicilar kayitlari güncelleme
if(isset($_POST['alicilarguncelle']))
{
	$alici_mail=$_POST['eposta'];
	$kaydet=$db->prepare("UPDATE alicilar set 
		FirmaAdi=:firma_adi, 
		YetkiliAdi=:yetkili_adi,
		Adres=:adres,
		Sehir=:sehir,
		Telefon=:telefon_no,
		Faks=:faks_no,
		CepTelefonu=:cep_no,
		Eposta=:eposta,
		vergidairesi=:vergidairesi,
		vergino=:vergino
		where AliciId=:id
		");

	$insert=$kaydet->execute(array(
		'firma_adi'=>$_POST['firma_adi'],
		'yetkili_adi'=>$_POST['yetkili_adi'],
		'adres'=>$_POST['adres'],
		'sehir'=>$_POST['sehir'],
		'telefon_no'=>$_POST['telefon_no'],
		'faks_no'=>$_POST['faks_no'],
		'cep_no'=>$_POST['cep_no'],
		'eposta'=>$_POST['eposta'],
		'vergidairesi'=>$_POST['vergidairesi'],
		'vergino'=>$_POST['vergino'],
		'id'=>$_POST['id'],
	));

	if ($insert) 
	{
		$logbilgi=$_POST['id']." ID'li müşterinin bilgileri güncellendi. ".$_POST['firma_adi']."/".$_POST['sehir'];
		$log=logDBKayit("MÜŞTERİ GÜNCELLEME",$_POST['admin'],$logbilgi);
		Header("Location: tumkayitlariesitleislem.php?kont=ok&email=$alici_mail"); exit();
		//Header("Location: musteriler.php?durum=duzok"); //exit;
	}
	else
	{
		Header("Location: musteriler.php?durum=duzno"); exit;
	}
}


//satis kayitlari güncelleme
if(isset($_POST['satisguncelle']))
{
	$kaydet=$db->prepare("UPDATE satislar set 
		firma_adi=:firma_adi, 
		sehir=:sehir,
		model_adi=:model_adi,
		urun_serino=:serino,
		satis_tarihi=:satis_tarihi
		where satis_id=:id
		");

	$insert=$kaydet->execute(array(
		'firma_adi'=>$_POST['firma_adi'],
		'sehir'=>$_POST['sehir'],
		'model_adi'=>$_POST['model_adi'],
		'serino'=>$_POST['serino'],
		'satis_tarihi'=>$_POST['satis_tarihi'],
		'id'=>$_POST['id'],
	));
	
	if ($insert) 
	{
		$logbilgi=$_POST['firma_adi']."/".$_POST['sehir']." müşterinin, ".$_POST['id']." ID'li satışı güncellendi.";
		$log=logDBKayit("SATIŞ GÜNCELLEME",$_POST['admin'],$logbilgi);
		Header("Location: satislar.php?durum=duzok&$log"); exit;
	}
	else
	{
		Header("Location: satislar.php?durum=duzno"); exit;
	}
}


//model kayitlari güncelleme
if(isset($_POST['modelguncelle']))
{
	$kaydet=$db->prepare("UPDATE model set 
		urun_kategorisi=:urun_kategorisi, 
		model_adi=:model_adi
		where model_id=:id
		");

	$insert=$kaydet->execute(array(
		'urun_kategorisi'=>$_POST['urun_kategorisi'],
		'model_adi'=>$_POST['model_adi'],
		'id'=>$_POST['id'],
	));

	if ($insert) 
	{
		$logbilgi=$_POST['id']." ID'li model güncellendi. ".$_POST['urun_kategorisi']." / ".$_POST['model_adi'];
		$log=logDBKayit("MODEL GÜNCELLEME",$_POST['admin'],$logbilgi);
		Header("Location: modeller.php?durum=duzok&$log"); exit;
	}
	else
	{
		Header("Location: modeller.php?durum=duzno"); exit;
	}
}


//Servis kayit incele sil butonu
if(isset($_POST['servissil']))
{
	$bilgisor=$db->prepare("SELECT * FROM yeniserviskayit where id=:id");
	$bilgisor->execute(array(
		'id'=>$_POST['servis_id']
	));
	$bilgicek=$bilgisor->fetch(PDO::FETCH_ASSOC);

	$sil=$db->prepare("DELETE from yeniserviskayit where id=:id");
	$kontrol=$sil->execute(array(
		'id'=>$_POST['servis_id']
	));
	if ($kontrol) 
	{
		$logbilgi=$bilgicek['musteri_adsoyad']."/".$bilgicek['il_adi']." müşteriye ait ".$bilgicek['seri_no']." cihazın ".$_POST['servis_id']." ID'li, servis kaydı silindi.";
		$log=logDBKayit("SERVİS KAYDI SİLME",$_POST['admin'],$logbilgi);
		Header("Location: serviskayitlari.php?durum=silok&$log"); exit;
	}
	else
	{
		Header("Location: serviskayitlari.php?durum=silno"); exit;
	}
}


//Alici incele sil butonu
if(isset($_POST['musterisil']))
{
	$bilgisor=$db->prepare("SELECT * FROM alicilar where AliciId=:id");
	$bilgisor->execute(array(
		'id'=>$_POST['musteri_id']
	));
	$bilgicek=$bilgisor->fetch(PDO::FETCH_ASSOC);

	$sil=$db->prepare("DELETE from alicilar where AliciId=:id");
	$kontrol=$sil->execute(array(
		'id'=>$_POST['musteri_id']
	));
	if ($kontrol) 
	{
		$logbilgi=$_POST['musteri_id']." ID'li ".$bilgicek['FirmaAdi']."/".$bilgicek['Sehir']." müşteri silindi.";
		$log=logDBKayit("MÜŞTERİ SİLME",$_POST['admin'],$logbilgi);
		Header("Location: musteriler.php?durum=silok&$log"); exit;
	}
	else
	{
		Header("Location: musteriler.php?durum=silno"); exit;
	}
}

//satis incele sil butonu
if(isset($_POST['satissil']))
{
	$bilgisor=$db->prepare("SELECT * FROM satislar where satis_id=:id");
	$bilgisor->execute(array(
		'id'=>$_POST['satis_id']
	));
	$bilgicek=$bilgisor->fetch(PDO::FETCH_ASSOC);

	$sil=$db->prepare("DELETE from satislar where satis_id=:id");
	$kontrol=$sil->execute(array(
		'id'=>$_POST['satis_id']
	));
	if ($kontrol) 
	{
		$logbilgi=$bilgicek['firma_adi']."/".$bilgicek['sehir']." müşteriye yapılmış".$_POST['satis_id']." ID'li, satış kaydı silindi. Satılan cihazın S.No: ".$bilgicek['urun_serino'];
		$log=logDBKayit("SATIŞ SİLME",$_POST['admin'],$logbilgi);
		Header("Location: satislar.php?durum=silok&$log"); exit;
	}
	else
	{
		Header("Location: satislar.php?durum=silno"); exit;
	}
}

//model incele sil butonu
if(isset($_POST['modelsil']))
{
	$bilgisor=$db->prepare("SELECT * FROM model where model_id=:id");
	$bilgisor->execute(array(
		'id'=>$_POST['model_id']
	));
	$bilgicek=$bilgisor->fetch(PDO::FETCH_ASSOC);

	$sil=$db->prepare("DELETE from model where model_id=:id");
	$kontrol=$sil->execute(array(
		'id'=>$_POST['model_id']
	));
	if ($kontrol) 
	{
		$logbilgi=$_POST['model_id']." ID'li, ".$bilgicek['urun_kategorisi']."/".$bilgicek['model_adi']." model silindi.";
		$log=logDBKayit("MODEL SİLME",$_POST['admin'],$logbilgi);
		Header("Location: modeller.php?durum=silok&$log"); exit;
	}
	else
	{
		Header("Location: modeller.php?durum=silno"); exit;
	}
}



//yeni giris sayfasi admin-kullanici beraber
if (isset($_POST['giris'])) {
	//Admin
	$kullanici_eposta=htmlspecialchars($_POST['kullanici_eposta']);
	$kullanici_sifresi=md5($_POST['kullanici_sifresi']);

	$kullanicisor=$db->prepare("SELECT * from personel where kullanici_adi=:adi and kullanici_sifresi=:pass ");
	$kullanicisor->execute(array(
		'adi'=> $kullanici_eposta, 
		'pass'=> $kullanici_sifresi
	));

	$kontrolad=$kullanicisor->rowcount();
	if ($kontrolad==1) {
		//echo "basarili";

		$_SESSION['kullanici_adi']=$kullanici_eposta;
		$log=logDBKayit("ADMİN GİRİŞ",$kullanici_eposta,"Admin girişi.");
		header("Location: index.php");
		exit();	
	}
	else{
		//header("Location:../login.php?durum=noad");
		//exit();
	} 

	//Kullanici 
	$kullanicisor=$db->prepare("SELECT * from alicilar where Eposta=:eposta and kullanici_sifresi=:pass ");
	$kullanicisor->execute(array(
		'eposta'=> $kullanici_eposta, 
		'pass'=> $kullanici_sifresi
	));

	$kontrol=$kullanicisor->rowcount();
	if ($kontrol==1) {
		//echo "basarili";

		$_SESSION['kullanici_eposta']=$kullanici_eposta;
		$log=logDBKayit("MÜŞTERİ GİRİŞ",$kullanici_eposta,"Müşteri girişi.");
		header("Location: musteriserviskayitlarim.php");
		exit();	
	}
	else{
		header("Location: ../login.php?durum=no");
		exit();
	}
}

//KULLANICI ŞİFRE GÜNCELLEME
if (isset($_POST['kullanicisifreguncelle'])) {

	$kullanici_eskipassword=trim($_POST['kullanici_eskipassword']);
	$kullanici_passwordone=trim($_POST['kullanici_passwordone']);
	$kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']);

	$kullanici_password=md5($kullanici_eskipassword);


	$kullanicisor=$db->prepare("SELECT * from alicilar where kullanici_sifresi=:password");
	$kullanicisor->execute(array(
		'password' => $kullanici_password
	));

	$say=$kullanicisor->rowCount();

	if ($say==0) {
		header("Location: sifreguncelle.php?durum=eskisifrehata");
	} 
	else { //eski şifre doğruysa başla
		if ($kullanici_passwordone==$kullanici_passwordtwo) {
			if (strlen($kullanici_passwordone)>=6) {
				
				$password=md5($kullanici_passwordone);

				$kullanicikaydet=$db->prepare("UPDATE alicilar SET
					kullanici_sifresi=:kullanici_password
					WHERE AliciId={$_POST['kullanici_id']}"
				);

				$insert=$kullanicikaydet->execute(array(
					'kullanici_password' => $password
				));

				if ($insert) {
					//$mesaj=mailgonder("sifre",$_POST['mail_adresi'],$_POST['yetkili_adi']);
					$log=logDBKayit("MÜŞTERİ ŞİFRE DEĞİŞTİRME",$_POST['mail_adresi'],"Şifre değiştirme.");
					header("Location:sifreguncelle.php?durum=sifredegisti&$mesaj");
				} 
				else {
					header("Location:sifreguncelle.php?durum=no"); exit();
				}
			} 
			else {
				header("Location:sifreguncelle.php?durum=eksiksifre"); exit();
			}
		} 
		else {
			header("Location:sifreguncelle.php?durum=sifreleruyusmuyor");
			exit;
		}
	}
	exit;
}



?>