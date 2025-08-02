<?php
//Sambungan ke pangkalan data
include ('db_conn.php');
?>
<style>
#mainbody {
	background-color: #FFF5EE;
	padding: 0px;
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
#notis {
	text-align: center;
	color: #FCBD34;
	font-size: 20px;
	font-family: Times New Roman;
	font-weight: bold;
	background-color: #2C2C2C;
	padding: 5px;
}
</style>
<body>

<div id ="mainbody">
	<br>
	<div id="tajuk"><p class="resizable-text">Menu Makanan</p></div>

	<?php
	//Query SQL untuk dapatkan data dari pangkalan data
	$mysql = "SELECT * FROM makanan ORDER BY kodMakanan";
	$result = mysqli_query($conn, $mysql) or die(mysql_error());

	//Dapatkan jumlah rekod dalam jadual
	$jumlah = mysqli_num_rows($result);

	if ($jumlah > 0)
	{
		echo "<p id='notis' class='resizable-text'>** Sila log masuk untuk membuat tempahan makanan **</p>";
		echo "<table><tr>";
		
		foreach($result as $i => $row)
		{
		//Dapatkan gambar makanan dari folder
		$gmbr = "gambar/".$row['gambar'];
		
		//format decimal untuk harga
		$harga = number_format($row['harga'], 2);
		
		//Papar maklumat makanan
		echo "<td>";
		echo "<img src=".$gmbr." width = '250px' height = '250px'>";
		echo "<p class='resizable-text'>".$row['makanan'];
		echo "<p class='resizable-text'>RM ".$harga;
		echo "<p><hr></td>";
		
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
</body>
</html>

<?php
//Tutup sambungan pangkalan data
mysqli_close($conn);
?>