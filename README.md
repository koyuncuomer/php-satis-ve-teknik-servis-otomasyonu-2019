# Satış ve Teknik Servis Otomasyonu
**Demo:**  [Satış ve Teknik Servis DEMO](https://omerkoyuncu.site/demo "satis ve teknik servis demo")   :point_left:

İlgili firma, müşterilerini, yaptığı satışları, ürettiği modelleri görebilir gerektiğinde bu bilgileri düzenleyebilir. Yeni müşteri, satış, model kaydı yapabilir. Müşteriler satın aldıkları ürünler için servis kaydı oluşturabilir. Firma yetkilileri bu servis kayıtlarını inceleyip düzenlebilir. Ürünün servis kaydı ile ilgili tüm bu düzenlemeler müşteriye mail olarak bildirilir. Tüm bu olaylar loglanmaktadır.
> **Frontend için [github.com/ColorlibHQ/gentelella](https://github.com/ColorlibHQ/gentelella "github.com/ColorlibHQ/gentelella") kullanılmıştır.**  
> **Mail için [github.com/PHPMailer/PHPMailer](https://github.com/PHPMailer/PHPMailer "github.com/PHPMailer/PHPMailer") kullanılmıştır.**

------------

**Sitenin firma yani teknik servis tarafı 6 ana bölümden oluşur.**
- Servis kayıtları,
- Müşteriler,
- Satışler,
- Modeller,
- Personel,
- Log kayıtları

**Sitenin müşteri tarafı ise 2 ana bölümden oluşur.**
- Servis Kayıtlarım,
- Satın Aldığın Ürünler

----
![php](https://user-images.githubusercontent.com/34441864/129705486-06127b42-0664-46ad-ba33-a4270417896b.gif)

### Kullanım
Veritabanı bağlantısı için `nedmin\production\baglan.php` kullandığınız sunucuya göre düzenlenmelidir.  
Mail gönderebilmek için `nedmin\mailphp\mailgonder.php` ve aynı dizindeki `sifreislemleri.php` kullandığınız sunucuya göre düzenlenmelidir.

### Lisans
MIT License [LICENSE.md](https://github.com/koyuncuomer/php-satis-ve-teknik-servis-otomasyonu-2019/blob/8eedaf6a61e2cd70ef2cbb661c2e49f4ee6c0531/LICENSE "LICENSE.md")
