<!DOCTYPE html>

<html lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
</head>

<?php

//KULLANICININ ŞİFRE UNUTTUM SAYFASININ İŞLEM KISMI

include '../production/baglan.php';
include '../production/logtutma.php';
require("class.phpmailer.php");

echo "İşleminiz gerçekleştiriliyor lütfen bekleyiniz..";

if (isset($_POST['sifreunuttum']) && $_POST['toplam']==$_POST['islem']) {

	$kullanici_eposta=htmlspecialchars($_POST['kullanici_eposta']);
	$kullanicisor=$db->prepare("select * from alicilar where Eposta=:mail");
	$kullanicisor->execute(array(
		'mail' => $kullanici_eposta
	));

	$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
	$kullanici_id=$kullanicicek['AliciId'];
	$yetkili_adi=$kullanicicek['YetkiliAdi'];
	$say=$kullanicisor->rowCount();

	if ($say){

		function randomPassword(){
			$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
			$pass = array();
			$alphaLength = strlen($alphabet) - 1; 
			for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			return implode($pass);
		} 

		$kullanici_password=randomPassword();
		$kaydet=$db->prepare("UPDATE alicilar SET

			kullanici_sifresi=:password

			WHERE AliciId={$kullanici_id}");

		$update=$kaydet->execute(array( 

			'password' => md5($kullanici_password)

		));

		if ($update) {
      //echo "veritabani kayit basarili";
			$log=logtutma("SIFIRLAMA","MÜŞTERİ",$kullanici_eposta,"");

			$mail = new PHPMailer();
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

      //Çoklu mail için bu satır çoğaltılabilir
			$mail->AddAddress($kullanici_eposta);

			$mail->Subject  =  "Şifre Yenileme Bilgisi";
			$mail->Body     = "Sayın ".$yetkili_adi." hesabınızın şifresi isteğiniz üzerine sıfırlanmıştır. Yenilenen şifreniz: ".$kullanici_password;

			if($mail->Send())
			{
        //echo "mesaj gönderildi"; 
				echo'<meta http-equiv="refresh" content="0;URL=../production/sifreunuttum.php?durum=ok">'; 
			}
			else{
        //echo "mesaj gönderilemedi: " . $mail->ErrorInfo;
				echo'<meta http-equiv="refresh" content="0;URL=../production/sifreunuttum.php?durum=ok0">'; 
			}

		} 
		else {
      //echo "veritabanına kayit başarısız";
			echo'<meta http-equiv="refresh" content="0;URL=../production/sifreunuttum.php?durum=no0">'; 
		}

	}
	else{
    //echo "böyle bi eposta yok";
		echo'<meta http-equiv="refresh" content="0;URL=../production/sifreunuttum.php?durum=no">'; 
	}

}
else{
  //echo "bot kontrol";
	echo'<meta http-equiv="refresh" content="0;URL=../production/sifreunuttum.php?durum=bot">';
}


?>

</html>