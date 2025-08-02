<?php
//Navigasi dan banner
include ("nav.php");
include ("header.php");
?>
<html>
<style>
#mainbody {
	background-color: #FFF5EE;
	padding: 35px;
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
	font-weight: bold;
	margin: auto;
	background-color: #F0F8FF;
	border-spacing: 0;
	border-radius: 50px;
    overflow: hidden;
}
table, td {
	text-align: right;
}
tr{
	height: 38px;
}
</style>
<body>

<div id="mainbody">
<!-- form action akan bawa pengguna untuk proses seterusnya selepas pengguna klik butang submit-->
<form action="proses_daftar.php" method="POST">

<div id="tajuk" class="resizable-text">Daftar Pelanggan Baharu</div><p>

<table cellpadding = '15px'>
<tr>
	<td style="width: 20px"></td>
	<td></td>
	<td></td>
	<td style="width: 20px"></td>
</tr>
<tr>
	<td></td>
	<td class="resizable-text">No Telefon :</td>
	<td><input type="text" name="noTel" pattern="[0-9]{3}-[0-9]{7,8}" placeholder="000-00000000" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td class="resizable-text">Nama :</td>
	<td><input type="text" name="nama" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><input type="submit" name="btnDaf" value="Daftar" class="resizable-text"></td>
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