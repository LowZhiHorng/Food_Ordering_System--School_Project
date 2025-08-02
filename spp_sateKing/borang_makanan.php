<?php
include ("nav2.php");
include ("header.php");
?>
<html>
<style>
#mainbody {
	background-color: #FFF5EE;
	padding: 21px;
}
#tajuk {
	font-size: 30px;
	font-family: monospace;
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
	height: 30px;
}
input {
	width: 350px; /* saiz untuk kotak input */
}
</style>
<body>

<div id="mainbody">
<form action="proses_makanan.php" method="POST" enctype="multipart/form-data">
<div id="tajuk" class="resizable-text">Borang Tambah Makanan</div>
<p>
<table cellpadding='9px'>
<tr>
	<td style="width: 20px"></td>
	<td></td>
	<td></td>
	<td style="width: 20px"></td>
</tr>
<tr>
	<td></td>
	<td class="resizable-text">Kod Makanan :</td>
	<td><input type="text" name="kd" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td class="resizable-text">Nama Makanan :</td>
	<td><input type="text" name="nm" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td class="resizable-text">Harga (RM) :</td>
	<td><input type="number" name="hg" step="any" min="0" max="5" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td class="resizable-text">Gambar :</td>
	<td><input type="file" name="gmbr" accept=".png, .jpg, .jpeg" required class="resizable-text"></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><input type="submit" name="simpan" value ="SIMPAN" class="resizable-text"></td>
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