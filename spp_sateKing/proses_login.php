<?php
//Start session
session_start();

include ("db_conn.php");

//Dapatkan kategori pengguna, 1=Admin 2=Pelanggan
$kat = $_GET['kat'];

//Data & proses yang berbeza untuk jenis pengguna
if ($kat == 1) {
	//Dapatkan data dari borang login
	$login = $_POST['logid'];
	$pwd = $_POST['klaluan'];
	
	//Untuk query SQL
	$jad = "admin";
	$sql = "login_id='$login' AND kata_laluan='$pwd'";
	
	//Link redirect selepas berjaya login
	$link1 = "senarai_makanan.php";
	
	//Link redirect jika gagal login
	$link2 = "borang_loginAdmin.php";
	
	$id_1 = "login_id";
}
else {
	//Dapatkan data dari borang login
	$login = $_POST['noTel'];
	
	//untuk query sql
	$jad = "pelanggan";
	$sql = "noTelefon='$login'";
	
	//Link redirect selepas berjaya login
	$link1 = "menu.php";
	
	//Link redirect jika gagal login
	$link2 = "borang_login.php";
	
	$id_1 = "noTelefon";
	
	//Kira bil.rekod dalam jadual sebelum menjana noPesanan baru
	//noPesanan baru akan dicipta setiap kali pelanggan login
	$mysql = "SELECT COUNT(*) AS kira_bil FROM pesanan";
	$result = mysqli_query($conn,$mysql) or die(mysqli_error());
	
	$bil = 0;
	
	if ($result) {
		$row = mysqli_fetch_assoc($result);
		$bil = $row['kira_bil'];
	}
	
	//Jana noPesanan baharu (based on bil.rekod +1)
	$_SESSION['noPesanan'] = str_pad($bil + 1, 4, "0", STR_PAD_LEFT);
	
	//Simpan no_pesanan_baru dalam session
	$no_pesanan_baru = $_SESSION['noPesanan'];
}

//Semak login_ID dan kata_laluan (admin) dalam jadual
//Atau semak noTelefon (pelanggan) dalam jadual
$query = "SELECT * FROM $jad WHERE $sql";
$result = mysqli_query($conn, $query) or die(mysqli_error());
$row = mysqli_fetch_array($result);

//Jika rekod WUJUD dalam PD
if (mysqli_num_rows($result) > 0)
{
	//Dapatkan nama dan login_id($id) - admin
	//Atau dapatkan nama dan noTelefon($id) - pelanggan
	$nama = $row['nama'];
	$id = $row[$id_1];
	
	//Simpan data session
	$_SESSION['id'] = $id;
	$_SESSION['nama'] = $nama;
	$_SESSION['kat'] = $kat;
	
	//Papar popup mesej jika berjaya login
	echo '<script>alert("Selamat datang '.$nama.'");window.location.href="'.$link1.'";</script>';
}

//Jika rekod TIDAK WUJUD dalam PD
else
{
	echo '<script>alert("Login ID atau Kata Laluan SALAH!!");window.location.href="'.$link2.'";</script>';
}

mysqli_close($conn);
?>