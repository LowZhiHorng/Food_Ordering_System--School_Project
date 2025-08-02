<?php
include ("nav2.php");
include ("header.php");
?>
<html>
<head>
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
.table {
	margin-left: auto;
	margin-right: auto;
	border-collapse: separate;
	margin: auto;
	text-align: center;
	border-spacing: 0;
	border-radius: 15px;
    overflow: hidden;
}
.table td {
	border-bottom: 1px solid #5F9EA0;
	height: 30px;
	font-family: Comic Sans MS;
	font-size: 18px;
	color: #000000;
}
.table tr:nth-child(even) {
	background-color: #F5E5D1;
}
.table tr:nth-child(odd) {
	background-color: #FFFFFF;
}
.table th {
	height: 50px;
	text-align: center;
	font-size: 20px;
	font-family: Arial;
	font-weight: bold;
	color : #FFFFFF;
	background-color: #D88A6E;
}
table th:nth-child(2), td:nth-child(2){
	text-align: left;
}
</style>
</head>
<body>

<div id="mainbody">
<div id="tajuk" class="resizable-text">Senarai Staf<p></div>

<?php
//dapatkan maklumat staf dari jadual
$sql = "SELECT * FROM admin ORDER BY nama";
$result = mysqli_query($conn, $sql) or die(mysqli_error());

$bil = 0;

if (mysqli_num_rows($result) > 0)
{
	//table untuk paparan data
	echo "<table class='table'>";
	echo "<col width='90'>";	//saiz column 1
	echo "<col width='200'>";	//saiz column 2
	echo "<tr>";
	echo "<th class='resizable-text'>Bil</th>";		//column 1
	echo "<th class='resizable-text'>Nama Staf</th>";	//column 2
	echo "</tr>";
	
	//papar semua data dari jadual
	while($row = mysqli_fetch_assoc($result))
	{
		$bil++;
		echo "<tr height='35'>";
		echo "<td class='resizable-text'>".$bil.".</td>";
		echo "<td class='resizable-text'>".$row['nama']."</td>";
		echo "</tr>";
	}
		echo "</table>";
}
else { echo "<center class='resizable-text'>Tiada rekod</center>"; }
?>

<div id="tajuk" class="resizable-text"><h6>Muat Naik Data Staf</h6></div>

<!-- borang untuk muatnaik -->
<form action="proses_muatnaik.php" method="POST" enctype="multipart/form-data">
<center>
<span class="resizable-text">
Pilih fail untuk dimuat naik (Fail excel .csv sahaja) :
</span>
<input type="file" name="file_csv" accept=".csv" required class="resizable-text">
<p>
<input type="submit" name="upload" value="Muat Naik" class="resizable-text">
</p></center>
</form>

</div>
<?php include ("footer.php"); ?>
</body>
</html>