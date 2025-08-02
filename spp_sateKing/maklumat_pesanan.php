<?php
include ("nav2.php");
include ("header.php");

//Dapatkan noPesanan dari senarai pesanan
$noPesanan = $_GET['no'];
?>
<html>
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
#tbl1, #tbl2 {
	margin-left: auto;
	margin-right: auto;
	border-collapse: separate;
	margin: auto;
	border-spacing: 0;
	border-radius: 15px;
    overflow: hidden;
}
#tbl1 td {
	text-align: left;
	padding-top: 0px;
	padding-bottom: 8px;
	font-family: Arial;
	font-size: 20px;
}
#tbl2 th {
	height: 50px;
	text-align: center;
	font-weight: bold;
	font-size: 20px;
	font-family: Arial;
	color : #FFFFFF;
	background-color: #6a4c9c;
}
#tbl2 th, td {
	text-align: center;
	padding: 10px;
}
#tbl2 td {
	border-bottom: 1px solid #708090;
	height: 30px;
	font-family: Comic Sans MS;
	font-size: 18px;
	color: #000000;
}
#tbl2 tr:nth-child(even) {
	background-color: #E6D8F0;
}
#tbl2 tr:nth-child(odd) {
	background-color: #FFFFFF;
}
#tbl2 tr:hover {
	background-color: #FFF4CC;
}
#tbl1 td:nth-child(2) { text-align: right; }
#tbl2 td:nth-child(2) { text-align: left; }
#tbl2 th:nth-child(2) { text-align: left; }
</style>
<body>

<div id="mainbody">
<div id="tajuk" class="resizable-text"><p>Maklumat Pesanan Pelanggan</p></div>

<?php
//Query SQL untuk paparkan rekod pesanan pelanggan
//Pengiraan jumlah harga berdasarkan kuantiti
$sql = "SELECT *, 
	SUM(kuantiti * harga) AS Jumlah
	FROM pesanan
	INNER JOIN pelanggan USING (noTelefon)
	INNER JOIN maklumat_pesanan USING (noPesanan)
	INNER JOIN makanan USING (kodMakanan)
	WHERE noPesanan = '$noPesanan'
	GROUP BY kodMakanan";
$result = mysqli_query($conn, $sql) or die(mysql_error());

$bil = 0;

if (mysqli_num_rows($result) > 0)
{
	$jum = 0;
	
	while($row = mysqli_fetch_assoc($result)) {
		//Kira jumlah harga keseluruhan dengan menambah jumlah harga bagi setiap makanan
		//proses mengira Jumlah dibbuat dalam SQL baris 61
		$jum += $row['Jumlah'];
	}
	//Reset $result kepada row pertama semula, untuk papar hasil query while Loop di bawah
	mysqli_data_seek($result, 0);
	
	$row = mysqli_fetch_assoc($result);
	$tarikh = date('d-m-Y', strtotime($row['tarikh']));
?>

<table id="tbl1">
<col width='300'>
<col width='350'>
<tr>
	<td class="resizable-text"><b>No Pesanan :</b><?php echo $noPesanan; ?></td>
	<td class="resizable-text"><b>Tarikh :</b><?php echo $tarikh; ?></td>
</tr>
<tr>
	<td class="resizable-text"><b>Nama Pelanggan : </b><?php echo $row['nama']; ?></td>
	<td class="resizable-text"><b>Jumlah Keseluruhan : </b>RM <?php echo number_format($jum, 2); ?></td>
</tr>
</table>
<p>

<table id="tbl2">
	<col width='100'>
	<col width='200'>
	<col width='100'>
	<col width='170'>
	<tr>
		<th class="resizable-text">Bil</th>
		<th class="resizable-text">Makanan</th>
		<th class="resizable-text">Kuantiti</th>
		<th class="resizable-text">Jumlah Harga</th>
	</tr>

<?php
	//Reset $result kepada row pertama semula, untuk papar hasil query pada while Loop di baris 117
	mysqli_data_seek($result, 0);
	
	while($row = mysqli_fetch_assoc($result))
	{
		$bil++;
		
		$jum_harga = number_format($row['Jumlah'], 2);
		
		echo "<tr height='10'>";
		echo "<td class='resizable-text'>".$bil.".</td>";
		echo "<td class='resizable-text'>".$row['makanan']."</td>";
		echo "<td class='resizable-text'>".$row['kuantiti']."</td>";
		echo "<td class='resizable-text'>RM ".$jum_harga."</td>";
		echo "</tr>";
	}
		echo "</table>";
		
		//Butang kembali semula ke senarai pesanan dan butang cetak
		echo "<center><button onclick='history.back()' class='resizable-text'>Kembali</button>&emsp;";
		echo "<button onclick='window.print()' class='resizable-text'>Cetak Pesanan</button></center>";
}
else {
	echo "<center class='resizable-text'>Tiada rekod pesanan</center>"; }
?>

</div>
<?php include ("footer.php"); ?>
</body>
</html>