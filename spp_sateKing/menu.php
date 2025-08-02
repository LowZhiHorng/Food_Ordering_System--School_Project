<?php
include ("nav2.php");
include ("header.php");

date_default_timezone_set('Asia/Kuala_Lumpur');
$tarikh = date('Y-m-d');

//Dapatkan noPesanan dari session
$noPesanan = $_SESSION['noPesanan'];

//Semak jika noPesanan telah wujud
$semak = "SELECT * FROM pesanan WHERE noPesanan = '$noPesanan'";
$result = mysqli_query($conn, $semak);
$no_wujud = mysqli_num_rows($result) > 0;

#### Proses masuk pesanan makanan dalam bakul ####
#### Proses berlaku selepas pelanggan klik butang/ikon bakul ####
if (isset($_GET['btn']))
{
	//Dapatkan kuantiti pesanan dan kodMakanan
	$qty = $_POST['qty'];
	$kodM = $_GET['kod'];
	
	//Papar mesej popup jika pelanggan masukkan kuantiti <= 0
	if ($qty <= 0) {
		echo '<script>alert("Masukkan kuantiti yang betul");</script>';
	} else {
		//Jika pelanggan masukkan kuantiti yang betul,
		//semak jika makanan tersebut sudah wujud dalam bakul dengan noPesanan yang sama
		$semak2 = "SELECT * FROM maklumat_pesanan WHERE noPesanan = '$noPesanan' AND kodMakanan = '$kodM'";
		$result2 = mysqli_query($conn, $semak2);
		
		if (mysqli_num_rows($result2) > 0)
		{
			echo '<script>alert("Makanan sudah ADA dalam bakul");</script>';
		} else {
			//Simpan noPesanan dalam jadual pesanan jika nombor belum wujud
			if (!$no_wujud)
			{
				$simpan = "INSERT INTO pesanan(noPesanan, tarikh, noTelefon) VALUES('$noPesanan', '$tarikh', '$id')";
				mysqli_query($conn, $simpan);
				$no_wujud = true;
			}
			
			//Simpan maklumat makanan yang dipesan
			$simpan2 = "INSERT INTO maklumat_pesanan(noPesanan, kodMakanan, kuantiti) VALUES('$noPesanan', '$kodM', '$qty')";
			mysqli_query($conn, $simpan2);
			
			echo '<script>alert("Berjaya masuk bakul");</script>';
		}
	}
}
?>
<style>
#mainbody {
	background-color: #FFF5EE;
	padding: 19px;
}
#tajuk {
	font-size: 50px;
	font-family: Tw Cen MT Condensed;
	font-weight: bold;
	text-align: center;
}
table {
	margin-left: auto;
	margin-right: auto;
	border-collapse: collapse;
	margin: auto;
	cellpadding: 5px;
}
td {
	text-align: center;
	height: 30px;
	width: 265px;
	padding: 35px;
	vertical-align: top;
	font-family: Lucida Handwriting;
	font-weight: bold;
	font-size: 18px;
}
input[type="number"] {
	width: 50px;
	text-align: center;
	border-radius: 8px;
}
</style>
<body>

<div id ="mainbody">
<br><div id="tajuk" class="resizable-text"><p>Menu Makanan</p></div>

<!-- BORANG CARIAN -->
<form action="" method="post">
<p><center>
<select name="kategori" class="resizable-text">
	<option class="resizable-text">Pilih Carian</option>
	<option value="nama" class="resizable-text">Nama Makanan</option>
	<option value="harga" class="resizable-text">Harga Makanan</option>
</select>
: <input type="text" name="carian" class="resizable-text">
<input type="submit" value="Cari" name="cari" class="resizable-text">
</p></center>
</form>

<!-- QUERY UNTUK CARIAN -->
<?php
//Jika user klik butang "Cari" dan input carian tidak empty
if(isset($_POST['cari']) && !empty($_POST['carian']))
{
	//Kenalpasti dropdown list apa yang dipilih
	switch ($_POST["kategori"])
	{
		case "nama": //Jika pilih carian nama makanan
		$query = "SELECT * FROM makanan WHERE makanan LIKE '%$_POST[carian]%' ORDER BY kodMakanan";
		break;
		default: //Jika pilih carian harga makanan
		$query = "SELECT * FROM makanan WHERE harga LIKE '$_POST[carian]%' ORDER BY kodMakanan";
	}
} else {
	//Jika pengguna tak buat carian,papar semua menu
	$query = "SELECT * FROM makanan ORDER BY kodMakanan";
}
$mysql = $query;
$result = mysqli_query($conn, $mysql) or die(mysql_error());

//Dapatkan jumlah rekod dalam jadual
$jumlah = mysqli_num_rows($result);

if ($jumlah > 0)
{
	echo "<table><tr>";
	
	foreach($result as $i => $row)
	{
	//Dapatkan gambar makanan dari folder
	$gmbr = "gambar/".$row['gambar'];
	
	$kod = $row['kodMakanan'];
	
	//format decimal untuk harga
	$harga = number_format($row['harga'], 2);
	
	//Papar maklumat makanan
	echo "<td>";
	echo "<img src=".$gmbr." width = '250px' height = '250px'>";
	echo "<p class='resizable-text'>".$row['makanan'];
	echo "<p class='resizable-text'>RM ".$harga;
	
	//Form untuk input kuantiti pesanan
	echo "<form method='post' action='menu.php?kod=$kod&btn=1'>";
	echo "<p><input type='number' name='qty' value='0' min='0' class='resizable-text'>&emsp;";
	echo "<input type='image' src='gambar/bakul.png' title='Masuk Bakul' width='38' height='38'>";
	echo "</form>";
	echo "<hr></td>";
	
	//Hadkan data yang dipaparkan, 3 rekod dalam 1 baris
	$i++;
	$lajur = 3;
	if($i != $jumlah && $i >= $lajur && $i % $lajur == 0)
		echo "</tr><tr>";
	}
	echo "</tr></table>";
}
	else { echo "<center class='resizable-text'>Tiada rekod</center>"; }
?>
</div>
<?php include ("footer.php"); ?>
</body>
</html>

<?
//Tutup sambungan pangkalan data
mysqli_close($conn);
?>