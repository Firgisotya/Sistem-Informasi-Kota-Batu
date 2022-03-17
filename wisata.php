<?php 
$title = "Daftar Wisata Kota Batu";
include 'navbar.php';
include "config/koneksi.php";
$ktgr = $_GET['kategori'];
$cari = $_POST['txtcari'];
					if($cari == !""){
						$ambil = mysqli_query($conn,"SELECT * FROM wisata where nm_wisata like '%".$cari."%'");
					} else{
						if ($ktgr) {
							$ambil = mysqli_query($conn,"SELECT * FROM wisata WHERE ktgr_wisata = '$ktgr'");
						} else{
						$ambil = mysqli_query($conn,"SELECT * FROM wisata"); }
					}
?>
<div class="container" style="margin-top: 10px;">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php
if (mysqli_num_rows($ambil)) {
    foreach ($ambil as $tampung) {
            ?>
        <div class="col">
            <div class="card">
                <img src="images/wisata/<?= $tampung['gambar']; ?>" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?= $tampung['nm_wisata']; ?></h5>
                    <p class="card-text"><?= $tampung['deskripsi']; ?></p>
                    <hr>
                    <a href="detail-wisata.php?kd=<?php echo $tampung['kd_wisata']; ?>"
                        class="btn btn btn-outline-primary">Detail</a>
                </div>
            </div>

        </div>
        <?php
}
}

?>
    </div>
</div>
<style>
.card-img-top {
    width: 100%;
    height: 20vw;
    object-fit: cover;
}
</style>



<?php 
    
include 'footer.php';
?>