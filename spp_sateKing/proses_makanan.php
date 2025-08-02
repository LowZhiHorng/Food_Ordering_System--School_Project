<?php
include('session.php');

//Dapatkan data dari semua input pada borang_makanan.php
$kodM = $_POST['kd'];
$namaM = $_POST['nm'];
$hargaM = $_POST['hg'];

//Untuk dapatkan maklumat file gambar yang diupload
$fileExt = strtolower(pathinfo($_FILES["gmbr"]["name"], PATHINFO_EXTENSION));
$gambar = $_FILES["gmbr"]["name"];

//Untuk simpan gambar dalam folder
$tempname = $_FILES["gmbr"]["tmp_name"];

//Dapatkan nama folder untuk simpan gambar
$folder = "gambar/".$gambar;

//Simpan gambar dalam folder
move_uploaded_file($tempname, $folder);

//simpan data makanan dalam jadual PD
$mysql= "INSERT INTO makanan (kodMakanan, makanan, harga, gambar, login_id) VALUES ('$kodM', '$namaM', '$hargaM', '$gambar', '$id')";

if (mysqli_query($conn, $mysql)) {
	//papar popup mesej jika maklumat produk berjaya simpan
	echo '<script>alert("Makanan baharu berjaya disimpan!");window.location.href="senarai_makanan.php";</script>';
} else {
	echo "Error ; " . mysqli_error($conn); }

//Tutup sambungan PD
mysqli_close($conn);
?>