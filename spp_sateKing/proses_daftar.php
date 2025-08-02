<?php
include ("db_conn.php");

//dapatkan input dari borang
$noTel = $_POST['noTel'];
$nama = $_POST['nama'];

//semak jika noTelefon telah wujud dalam PD
$semak = "SELECT noTelefon FROM pelanggan WHERE noTelefon = '$noTel'";
$result = mysqli_query($conn, $semak) or die(mysqli_error());

//jika noTelefon sudah wujud, papar mesej popup
if (mysqli_num_rows($result) > 0)
{
	echo '<script>alert("No Telefon anda telah didaftarkan!!");window.location.href="borang_daftar.php";</script>';
}
else {
	//jika noTelefon belum wujud. simpan data dalam PD
	$mysql = "INSERT INTO pelanggan (noTelefon, nama) VALUES ('$noTel', '$nama')";
	
	if (mysqli_query($conn, $mysql))
	{
		echo '<script>alert("Berjaya Daftar Pelanggan!!");window.location.href="borang_login.php";</script>';
	} else {
		echo "Error ; " . mysqli_error($conn);	}
}

mysqli_close($conn);
?>