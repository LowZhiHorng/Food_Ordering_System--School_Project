<?php
//session
include('session.php');

//dapatkan kodMakanan
$kod = $_GET["kod"];

//dapatkan nama file gambar
$query = "SELECT * FROM makanan
		WHERE kodMakanan = '$kod'";
$result = mysqli_query($conn, $query) or die(mysqli_error());
$row = mysqli_fetch_array($result);

$gmbr = $row['gambar'];
$lokasi = "gambar/".$gmbr; //Lokasi gambar

//padam rekod dari jadual
$mysql = "DELETE FROM makanan
		WHERE kodMakanan='$kod'";
		
if (mysqli_query($conn, $mysql))
{
	//padam file gambar dalam folder
	unlink($lokasi);
	
	//papar javascript popup mesej jika rekod berjaya dipadam
	echo '<script>alert("Makanan berjaya dipadam!");window.location.href="senarai_makanan.php";</script>';
}
else { echo "Error ; " . mysqli_error($conn); }
?>