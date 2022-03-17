<?php
include "navbar.php";
include "config/koneksi.php";
error_reporting(0);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "<script>alert('ID User Belum Dipilih');document.location='profil-user.php'</script>";
}
$data = mysqli_query($conn,"SELECT * FROM user where id='$id'");
$daftar = mysqli_fetch_array($data);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h1>Edit User</h1>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $daftar['id']; ?>">
                            <label for="user">Nama</label>
                            <input type="text" class="form-control" id="nm_user" placeholder="Ganti nama" required=""
                                name="nm_user" value="<?php echo $daftar['nm_user']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required="">
                                <option><?= $tampung['jenis_kelamin']?></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tp_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tp_lahir" placeholder="Tempat Lahir"
                                name="tp_lahir" required="" value="<?php echo $daftar['tp_lahir']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir"
                                name="tgl_lahir" required="" value="<?php echo $daftar['tgl_lahir']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat"
                                required="" value="<?php echo $daftar['alamat']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomor Telepon</label>
                            <input type="text" class="form-control" id="no_hp" placeholder="Nomor Telepon" name="no_hp"
                                required="" value="<?php echo $daftar['no_hp']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="user">Nama Username</label>
                            <input type="text" class="form-control" id="user" placeholder="Ganti nama Username"
                                required="" name="username" value="<?php echo $daftar['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Ganti Email" required=""
                                name="email" value="<?php echo $daftar['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password User</label>
                            <input type="text" class="form-control" id="password" placeholder="Ganti Password User"
                                required="" name="password" value="<?php echo $daftar['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" id="foto" placeholder="Ganti Foto" required=""
                                name="foto" value="<?php echo $daftar['foto']; ?>">
                        </div>
                        <input type="submit" class="btn btn-outline-primary" value="Edit" name="edit">
                        <a class="btn btn-outline-primary" href="profil-user.php" role="button">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['edit'])) {

	$id = $_POST['id'];
	$name = $_POST['nm_user'];
	$jk = $_POST['jenis_kelamin'];
	$tplahir = $_POST['tp_lahir'];
	$tgllahir = $_POST['tgl_lahir'];
	$almt = $_POST['alamat'];
	$nohp = $_POST['no_hp'];
    $email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
    $nama_file = $_FILES['foto']['name'];
    $source = $_FILES['foto']['tmp_name'];
    $folder = '../images/profile/';
    move_uploaded_file($source, $folder . $nama_file);
	$edit =  mysqli_query($conn,"UPDATE user set nm_user='$name', jenis_kelamin='$jk', tp_lahir='$tplahir', tgl_lahir='$tgllahir', alamat='$almt', no_hp='$nohp', username='$user', password='$pass', email='$email', Foto='$nama_file' where id='$id'");
	if($edit){
		echo "<script>alert('Profil berhasil diedit'); document.location='profil-user.php'</script>";
	} else {
		echo "<script>alert('Profil gagal diedit')</script>";
		echo mysqli_error($conn);
	}
	var_dump($edit);
}
?>