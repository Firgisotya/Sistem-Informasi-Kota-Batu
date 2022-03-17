<?php
include 'navbar.php';
include "config/koneksi.php";
error_reporting(0);

$a = $_SESSION['id'];
$user = mysqli_query($conn, "SELECT * FROM user where id='$a'");
$user1 = mysqli_fetch_array($user);
?>
<div class="container">
    <div class="main-body mt-3">

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="images/profile/<?= $user1['foto']; ?>" alt="Admin" class="rounded-circle"
                                width="150" height="150">
                            <div class="mt-3">
                                <h4><?= $user1['username']; ?></h4>
                                <p class="text-secondary mb-1"><?= $user1['level']; ?></p>
                                <p class="text-muted font-size-sm"><?= $user1['alamat']; ?></p>
                                <a href="edit-profil.php?id=<?php echo $user1['id']; ?>"
                                    class="btn btn-primary">Edit</a>
                                <a href="index.php" class="btn btn-outline-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nama Lengkap</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $user1['nm_user']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $user1['email']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">No Telepon</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $user1['no_hp']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Jenis Kelamin</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $user1['jenis_kelamin']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Alamat</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $user1['alamat']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Tempat Lahir</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $user1['tp_lahir']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Tanggal Lahir</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $user1['tgl_lahir']; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<?php include "footer.php"; ?>