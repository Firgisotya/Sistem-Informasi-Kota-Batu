<?php 
$title = "Daftar Hotel Kota Batu";
include 'navbar.php';
include "config/koneksi.php";
                            ?>
<div class="container" style="margin-top: 10px;">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php
$ambil = mysqli_query($conn,"SELECT * FROM hotel ");
if (mysqli_num_rows($ambil)) {
    foreach ($ambil as $tampung) {
            ?>
        <div class="col">
            <div class="card">
                <img src="images/hotel/<?= $tampung['gambar']; ?>" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?= $tampung['nm_hotel']; ?></h5>
                    <p class="card-text"><?= $tampung['alamat']; ?></p>
                    <hr>
                    <a href="detail-hotel.php?kd=<?php echo $tampung['kd_hotel']; ?>"
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