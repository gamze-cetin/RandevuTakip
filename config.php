<?php

ob_start();
session_start();


$host="localhost";
$veritabani_ismi="gamjjje";
$kullanici_adi="gamjjje";
$sifre="123456";
//123456 şifre olabilir durumlar karışık 2.01.2022 geçmişine bakablirsin mysql şifreli kullanıcı kabul etmiyor sorunu



try{
	$db = new PDO("mysql:host=$host;dbname=$veritabani_ismi;charset=utf8",$kullanici_adi,$sifre);

}
catch(PDOException $e){
	echo "Veritabanı Bağlantı İşlemi Başarısız Oldu";
	echo $e->getMessage();
	exit;
	//exiti silersen hatalı olsa bile sistem çalışmış gibi devam eder

}


$sorgu=$db->prepare("SELECT * FROM ayarlar WHERE id=1");
$sorgu->execute();
$ayarcek=$sorgu->fetch(PDO::FETCH_ASSOC);

//sadece bu dosyadaki fonksiyonlar dosyası her zaman çağrılabilir
require_once __DIR__.'/fonksiyonlar.php';


    ?>

