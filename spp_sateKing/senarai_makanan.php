<?php
//nav2 : menu navigasi baru selepas login
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
table {
	margin-left: auto;
	margin-right: auto;
	border-collapse: separate;
	margin: auto;
	border-spacing: 0;
	border-radius: 15px;
    overflow: hidden;
}
th {	/* table header */
	height: 50px;
	text-align: center;
	font-weight: bold;
	font-size: 20px;
	font-family: Arial;
	color: #FFFFFF;
	background-color: #228B22;
}
td {
	text-align: center;
	height: 30px;
	font-family: Comic Sans MS;
	font-size: 18px;
}
tr:nth-child(even) {
	background-color: #D4EDDA;
}
tr:nth-child(odd) {
	background-color: #FFFFFF;
}
td:nth-child(4) { text-align: left; }
th:nth-child(4) { text-align: left; }
</style>

<body>

<div id="mainbody">
<div id="tajuk" class="resizable-text"><p>Senarai Makanan</p></div>

<!-- Papar senarai makanan -->
<?php
$query = "SELECT * FROM makanan ORDER BY kodMakanan";
$result = mysqli_query($conn, $query) or die(mysqli_error());

$bil = 0;

if (mysqli_num_rows($result) > 0)
{
	//table untuk paparan data
	echo "<table>";
	echo "<col width='10'>";		//saiz column 1
	echo "<col width='50'>";		//saiz column 2
	echo "<col width='150'>";		//saiz column 3
	echo "<col width='230'>";		//saiz column 4
	echo "<col width='150'>";		//saiz column 5
	echo "<col width='80'>";		//saiz column 6
	echo "<col width='80'>";		//saiz column 7
	echo "<tr>";
	echo "<th></th>";				//column 1
	echo "<th class='resizable-text'>Bil</th>";			//column 2
	echo "<th class='resizable-text'>Kod Makanan</th>";	//column 3
	echo "<th class='resizable-text'>Nama Makanan</th>";	//column 4
	echo "<th class='resizable-text'>Harga (RM)</th>";		//column 5
	echo "<th class='resizable-text'>Edit</th>";			//column 6
	echo "<th class='resizable-text'>Padam</th>";			//column 7
	echo "</tr>";
	
	//papar semua data dari jadual PD
	while($row = mysqli_fetch_assoc($result))
	{
		$bil++;
		$harga = number_format($row['harga'], 2);
		
		echo "<tr height='10'>";
		echo "<td></td>";
		echo "<td class='resizable-text'>".$bil.".</td>";
		echo "<td class='resizable-text'>".$row['kodMakanan']."</td>";
		echo "<td class='resizable-text'>".$row['makanan']."</td>";
		echo "<td class='resizable-text'>".$harga."</td>";
		echo "<td><a href='edit_makanan.php?kod=".$row['kodMakanan']."'>
			<img src='gambar/edit.png' width='45' height='45' title='Edit'>
			</a></td>";
		echo "<td><a href='padam_makanan.php?kod=".$row['kodMakanan']."'>
			<img src='gambar/delete.png' width='45' height='45' title='Padam'>
			</a></td>";
		echo "</tr>";
	}
	echo "</table>";
}
else { echo "<center class='resizable-text'>Tiada rekod</center>"; }
?>
</div>
<?php
include ("footer.php");
?>
</body>
</html>