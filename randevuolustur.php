<?php
require_once 'header.php';

if (isset($_POST['ekle'])) {
	$sorgu=$db->prepare("INSERT INTO randevu SET
		baslik=:baslik,
		tarih=:tarih,
		musteri=:musteri,
		sube=:sube,
		detay=:detay
    ");

	$sonuc=$sorgu->execute(array(
		'baslik' => $_POST['baslik'],
		'tarih' => $_POST['tarih'],
		'musteri' => $_POST['musteri'],
		'sube' => $_POST['sube'],
		'detay' => $_POST['detay']
	));


	if ($sonuc) {
		header("location:randevular.php?durum=ok");
	} else {
		header("location:randevular.php?durum=no");
	}


}



?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4>Randevu Ekle</h4>
				</div>
				<div class="card-body">
					<form action="" method="POST" accept-charset="utf-8">
						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Randevu Başlığı</label>
								<input type="text" class="form-control" name="baslik">
							</div>
							<div class="col-md-6 form-group">
								<label>Randevu Tarihi</label>
								<input type="date" class="form-control tarihsaat" autocomplete="off" value="" placeholder="Tarih Ve Saat Seçin" name="tarih">
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Müşteri</label>
								<select name="musteri" class="form-control">
									<?php
									$sorgu=$db->prepare("SELECT * FROM musteri");
									$sorgu->execute();
									while ($musteri=$sorgu->fetch(PDO::FETCH_ASSOC)) { ?>
										<option value="<?php echo $musteri['musteri_id'] ?>"><?php echo $musteri['musteri_isim'] ?></option>
									<?php }

									?>
								</select>
							</div>
							<div class="col-md-6 form-group">
								<label>Randevu Sube</label>
								<input type="text" class="form-control" name="sube">
							</div>
						</div>



						<div class="text-center mb-3">
							<label>Diğer Bilgiler</label>
							<textarea name="detay" class="form-control" style="min-height: 10rem"></textarea>
						</div>
						<hr>
						<div class="text-center">
							<button type="submit" name="ekle" class="btn btn-primary btn-lg">Kaydet</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once 'footer.php'; ?>