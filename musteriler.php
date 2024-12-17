<?php require_once 'header.php';
//silme işlemini bu sayfada burda yaptık

if (isset($_GET['sil'])) {
//sorguyu yazdık
	$sorgu=$db->prepare("DELETE FROM musteri WHERE musteri_id={$_GET['musteri_id']}");
	//sorguyu çalıştırdık
	$sonuc=$sorgu->execute();


	//doğru çalışığını anlarız
	if ($sonuc) {
		header("location:musteriler.php?durum=ok");
	} else {
		header("location:musteriler.php?durum=no");
	}
}



?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="font-weight-bold text-primary">Müşteriler</h4>
				</div>
				<div class="card-body">
					<table class="table table-bordered" id="tablo">
						<thead>
							<tr>
								<th>NO</th>
								<th>İsim Soyisim</th>
								<th>Mail Adresi</th>
								<th>Telefon Numarası</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>
						    <?php
						    //müşteri tablosundaki herşeyi çekmek için
						    // veritabanındaki tüm müşterileri liste atıyacak
						    $sorgu=$db->prepare("SELECT * FROM musteri");
							$sorgu->execute();
							$liste=$sorgu->fetchAll(PDO::FETCH_ASSOC);



						    foreach ($liste as $key => $musteri): ?> <tr>
						        <td><?php echo $musteri['musteri_id'] ?></td>
								<td><?php echo $musteri['musteri_isim'] ?></td>
								<td><?php echo $musteri['musteri_mail'] ?></td>
								<td><?php echo $musteri['musteri_telefon'] ?></td>
								<td>
								<!--düzenle ve silme butonları eklendi-->
										<a href="musteriduzenle.php?musteri_id=<?php echo $musteri['musteri_id'] ?>" class="btn btn-success">Düzenle</a>
										<a href="musteriler.php?sil=sil&musteri_id=<?php echo $musteri['musteri_id'] ?>" class="btn btn-danger">Sil</a>
								</td>
							</tr>
						    <?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



<?php require_once 'footer.php'; ?>
 <!-- gelişmiş tablolama için kullandın-->
<script>
     $(document).ready( function () {
        $('#tablo').DataTable({
        'language': dildosyasi

        });
     } );
</script>