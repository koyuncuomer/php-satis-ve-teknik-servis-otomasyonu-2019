<?php 
require_once 'baglan.php';

date_default_timezone_set('Europe/Istanbul');

function logDBKayit($log_tur,$log_sahip,$log_bilgi)
{
	global $db;
	$date=date('Y-m-d H:i:s');
	$ip_adres=$_SERVER['REMOTE_ADDR'];

	$logkaydet=$db->prepare("INSERT into logkayit set 
		logTur=:log_tur,
		logSahip=:log_sahip,
		logBilgi=:log_bilgi,
		logTarih=:log_tarih,
		logIP=:log_ip"
	);

	$loginsert=$logkaydet->execute(array(
		'log_tur'=>$log_tur,
		'log_sahip'=>$log_sahip,
		'log_bilgi'=>$log_bilgi,
		'log_tarih'=>$date,
		'log_ip'=>$ip_adres
	));
	if ($loginsert) 
	{
		//echo "basarili <br>";
		return "l=ok";
	}
	else
	{
		//echo "basarisiz <br>";
		return "l=no";
	}
}

?>