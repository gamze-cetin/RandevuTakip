<?php
 require_once 'header.php';


//deiğişiklik yapmak için
if (isset($_POST['ayarkaydet'])) {

	$sorgu=$db->prepare("UPDATE ayarlar SET
		site_baslik=:site_baslik,
		site_aciklama=:site_aciklama,
		site_link=:site_link
		");
	$sonuc=$sorgu->execute(array(
		'site_baslik' => $_POST['site_baslik'],
		'site_aciklama' => $_POST['site_aciklama'],
		'site_link' => $_POST['site_link']
));

//logo yüklenip yüklenmediğini kontrol ediyor
    if($_FILES['site_logo']['error']==0){

    }

//değişiklik yapılıp yapılmadığını doğru bir şekilde kontrol etmek için
  if ($sonuc) {
		header("location:ayarlar.php?durum=ok");
	} else {
		header("location:ayarlar.php?durum=no");
	}
}


?>

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                  <h5>Ayarlar Sayfası</h5>
               </div>

               <div class="card-body">
                  <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                       <div class="form-row">
                         <div class="col-md-6 form-group">
                           <label>Site Başlığı</label>
                           <input type="text" name="site_baslik" value="<?php echo $ayarcek['site_baslik']?>" placeholder="Site Başlığı" class="form-control">
                         </div>
                       </div>

                       <div class="form-row">
                         <div class="col-md-6 form-group">
                           <label>Site Açıklaması</label>
                           <input type="text" name="site_aciklama" value="<?php echo $ayarcek['site_aciklama']?>" placeholder="Site Açıklaması" class="form-control">
                         </div>
                       </div>

                       <div class="form-row">
                         <div class="col-md-6 form-group">
                           <label>Site Linki</label>
                           <input type="text" name="site_link" value="<?php echo $ayarcek['site_link']?>" placeholder="Site Linki" class="form-control">
                         </div>
                       </div>

                       <div class="form-row">
                         <div class="col-md-6 form-group">
                           <label>Site Logosu</label>
                           <input type="file" name="site_logo"  class="form-control">
                         </div>
                       </div>

                       <button type="submit" name="ayarkaydet" class="btn btn-info">Kaydet</button>
                  </form>
               </div>
             </div>
           </div>
         </div>
       </div>
<br /><b>Notice</b>:  Trying to access array offset on value of type bool in <b>C:\xampp\htdocs\randevu_takip\ayarlar.php</b> on line <b>34</b><br />
<?php require_once 'footer.php'; ?>