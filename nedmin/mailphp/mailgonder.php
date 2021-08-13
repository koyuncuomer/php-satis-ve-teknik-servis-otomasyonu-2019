<!DOCTYPE html>

<html lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
</head>

<?

require("class.phpmailer.php");
date_default_timezone_set('Europe/Istanbul');

function mailgonder() {

	$date=date('d.m.Y H:i:s');
	$tip=func_get_arg(0); //gelen 1. parametre
	$kullanici_eposta=func_get_arg(1); //gelen 2. parametre
	$kullanici_ad=func_get_arg(2);
	$mail = new PHPMailer();

	switch ($tip) {

		case "sifre":

		$subject = "Şifre Yenileme Bildirisi.";
		$body = "Sayın ".$kullanici_ad." hesabınızın şifresi ".$date." tarihinde değiştirilmiştir. Eğer bu işlemi siz gerçekleştirdiyseniz bu mesajı dikkate almayınız. Aksi taktirde lütfen bizimle iletişime geçiniz.";
		break;

		case "servis":
		$durum=func_get_arg(3);
		$urunserino=func_get_arg(4);
		$subject = "Servis Kaydinda Değişiklik";
		$body ="Sayın ".$kullanici_ad.", ".$urunserino." seri numaralı cihazınızın servis kayıt durumu ".$date." tarihinde ".$durum." olarak degişmiştir. Detaylı bilgi için servis kaydınızı inceleyiniz.";
		break;

		default:
		//kodlar
		break;

	}

	$mail->IsSMTP();  
	//$mail->SMTPKeepAlive=true; 
	$mail->SMTPAuth = true;  
	//$mail->SMTPSevure='tls';

	$mail->Port = 25;
	//$mail->Port = 465;

	$mail->Host = "MAİLSUNUCUNUZ.com"; 
	$mail->Username = "bilgi@MAİLSUNUCUNUZ.com";  
	$mail->Password = "ŞİFRENİZ";
	$mail->From     = "bilgi@MAİLSUNUCUNUZ.com"; 

	$mail->CharSet = "utf-8"; 
	$mail->Fromname = "Firma Bilgilendirme";

	//Çoklu mail için bu satırı çoğaltılabilir
	$mail->AddAddress($kullanici_eposta);
	
	$mail->Subject  =  $subject;
	$mail->Body     =$body;

	if($mail->Send())
	{
		//echo "mesaj gönderildi";
		return "mesaj=ok";
	}
	else{
		//echo "mesaj gönderilemedi: " . $mail->ErrorInfo;
		return "mesaj=no";
	}

}

?>