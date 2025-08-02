<?php
include ("nav2.php");
include ("header.php");
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
#notis {
	text-align: center;
	color: #FCBD34;
	font-size: 20px;
	font-weight: bold;
	font-family: Times New Roman;
	background-color: #2C2C2C;
	padding: 5px;
}
table {
	margin-left: auto;
	margin-right: auto;
	border-collapse: separate;
	margin: auto;
	border-spacing: 0;
	border-radius: 15px;
    overflow: hidden;
}
th {
	height: 50px;
	text-align: center;
	font-weight: bold;
	font-size: 20px;
	font-family: Arial;
	color: #FFFFFF;
	background-color: #3A4C8B;
}
th, td {
	text-align: center;
	padding: 10px;
}
td {
	border-bottom: 1px solid #CDC1F0;
	height: 30px;
	font-family: Comic Sans MS;
	font-size: 18px;
	color: #000000;
}
tr:nth-child(even) {
	background-color: #D1E3F8;
}
tr:nth-child(odd) {
	background-color: #FFFFFF;
}
tr:hover {
	background-color: #FFF4CC;
}
td:nth-child(3) { text-align: left; }
th:nth-child(3) { text-align: left; }
a { text-decoration: none; }
a:link { color: #000000; }
a:hover { color: #B8860B; font-weight: bold; }
</style>
<body>

<div id="mainbody">
<div id="tajuk" class="resizable-text">
	<p>Senarai Pesanan Pelanggan</p></div>
<p id="notis" class="resizable-text">** Klik no pesanan untuk melihat maklumat pesanan pelanggan **</p>

<?php
//Query SQL untuk paparkan semua pesanan pelanggan
$sql = "SELECT *,
	SUM(kuantiti * harga) AS Jumlah
	FROM pesanan
	INNER JOIN pelanggan USING (noTelefon)
	INNER JOIN maklumat_pesanan USING (noPesanan)
	INNER JOIN makanan USING (kodMakanan)
	GROUP BY noPesanan, tarikh
	ORDER BY noPesanan DESC";
$result = mysqli_query($conn, $sql) or die(mysql_error());

$bil = 0;

if (mysqli_num_rows($result) > 0)
{
?>

<table class="tbl2">
	<col width='100'>
	<col width='150'>
	<col width='200'>
	<col width='170'>
	<col width='170'>
	<tr>
		<th class="resizable-text">Bil</th>
		<th class="resizable-text">No Pesanan</th>
		<th class="resizable-text">Nama Pelanggan</th>
		<th class="resizable-text">Tarikh Pesanan</th>
		<th class="resizable-text">Jumlah Harga</th>
	</tr>

<?php
	while($row = mysqli_fetch_assoc($result))
	{
		$bil++;
		
		$jum_harga = number_format($row['Jumlah'], 2);
		$tarikh = date('d-m-Y', strtotime($row['tarikh']));
		
		echo "<tr height='10'>";
		echo "<td class='resizable-text'>".$bil.".</td>";
		echo "<td class='resizable-text'><a href='maklumat_pesanan.php?no=".$row['noPesanan']."' class='resizable-text'>".$row['noPesanan']."</a></td>";
		echo "<td class='resizable-text'>".$row['nama']."</td>";
		echo "<td class='resizable-text'>".$tarikh."</td>";
		echo "<td class='resizable-text'>RM ".$jum_harga."</td>";
		echo "</tr>";
	}
		echo "</table>";
}
else {
	echo "<center class='resizable-text'>Tiada rekod pesanan</center>"; }
?>
</div>
<?php
include ("footer.php");
?>
</body>
</html>