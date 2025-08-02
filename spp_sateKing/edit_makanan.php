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
table {
	border: 2px solid #5F9EA0;
	border-collapse: separate;
	margin: auto;
	font-weight: bold;
	background-color: #F0F8FF;
	border-spacing: 0;
	border-radius: 50px;
    overflow: hidden;
}
td {
	vertical-align: top;
}
td:nth-child(2) {
	text-align: right;
}
tr {
	height: 38px;
}
input {
	width: 270px; /* saiz untuk kotak input */
}
tr:nth-child(6) { /* align butang ke kanan */
	text-align: right;
}
input[type=button] {
	width: 100px; /* saiz untuk butang kembali */
}
input[type=submit] {
	width: 100px; /* saiz untuk butang kemaskini */
}
</style>
<body>
<?php
//Dapatkan kodMakanan untuk dikemaskini
$kod = $_GET['kod'];

########## Jika user klik butang KEMASKINI, ##########
########## update rekod dalam jadual #################
if(isset($_POST['edit']))
{
	$sql = "UPDATE makanan
			SET makanan = '".$_POST['nm']."',
				harga = '".$_POST["hg"]."'
			WHERE kodMakanan = '$kod'";
			
	if (mysqli_query($conn, $sql)) {
		echo '<script>alert("Berjaya Kemaskini Makanan!");window.location.href="senarai_makanan.php";</script>';
	} else {
		echo "Error ; " . mysqli_error($conn);	}
}
#################### PROSES UPDATE TAMAT ####################

	//Dapatkan data makanan dari jadual
	//untuk diletakkan dalam textbox
	$sql2 = "SELECT * FROM makanan
			WHERE kodMakanan = '$kod'";
	$result2 = mysqli_query($conn, $sql2) or die(mysqli_error());
$row2 = mysqli_fetch_array($result2);

//Dapatkan gambar dari folder
$gmbr = "gambar/".$row2['gambar'];
?>

<div id="mainbody">
<form action="edit_makanan.php?kod=<?php echo $kod; ?>" method="POST">
<div id="tajuk" class="resizable-text">Kemaskini Maklumat Makanan</div>
<p>
<table cellpadding='10px'>
<tr>
	<td style="width: 20px"></td>
	<td></td>
	<td></td>
	<td style="width: 20px"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><img src="<?php echo $gmbr;?>" width="200px" height="200px"></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td class="resizable-text">Kod Makanan :</td>
	<td class="resizable-text"><?php echo $row2['kodMakanan']; ?></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td class="resizable-text">Nama Makanan :</td>
	<td><input type="text" name="nm" value="<?php echo $row2['makanan'];?>" required class="resizable-text"></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td class="resizable-text">Harga :</td>
	<td><input type="number" name="hg" value="<?php echo $row2['harga'];?>" step="any" min="0" max="5" required class="resizable-text"></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><input type="button" name="back" value="KEMBALI" onClick="javascript: history.go(-1)" class="resizable-text">
		<input type="submit" name="edit" value="KEMASKINI" class="resizable-text"></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
</table>

</form>
</div>
<?php include ("footer.php"); ?>
</body>
</html>