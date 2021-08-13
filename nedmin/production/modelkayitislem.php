<?php 

require_once 'baglan.php';
include 'logtutma.php';

if(isset($_POST['modelkayitbutton']))
{
	$kaydet=$db->prepare("INSERT into model set 
		urun_kategorisi=:urun_kategorisi,
		model_adi=:model_adi"
	);

	$insert=$kaydet->execute(array(
		'urun_kategorisi'=>$_POST['urun_kategorisi'],
		'model_adi'=>$_POST['model_adi'],
	));
	if ($insert) 
	{
		$logbilgi="'".$_POST['urun_kategorisi']."' kategorisine '".$_POST['model_adi']."' modeli eklendi.";
		$log=logDBKayit("MODEL KAYIT",$_POST['admin'],$logbilgi);
		Header("Location:modeller.php?durum=ok&$log"); exit;
	}
	else
	{
		Header("Location:modeller.php?durum=no"); exit;
	}
}


if(isset($_POST['kategorikayitbutton']))
{
	$kaydet=$db->prepare("INSERT into model set 
		urun_kategorisi=:urun_kategorisi,
		model_adi=:model_adi
		");

	$insert=$kaydet->execute(array(
		'urun_kategorisi'=>$_POST['urun_kategorisi'],
		'model_adi'=>$_POST['model_adi']
	));
	if ($insert) 
	{
		$logbilgi="Yeni '".$_POST['urun_kategorisi']."' kategorisi ve '".$_POST['model_adi']."' modeli eklendi.";
		$log=logDBKayit("MODEL KAYIT",$_POST['admin'],$logbilgi);
		Header("Location:modeller.php?durum=ok&$log"); exit;
	}
	else
	{
		Header("Location:modeller.php?durum=no"); exit;
	}

}



?>