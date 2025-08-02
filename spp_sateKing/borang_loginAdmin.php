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
td:nth-child(2) {
	text-align: right;
}
tr {
	height: 38px;
}
</style>
<body>

<div id="mainbody">
<!-- form action akan bawa pengguna untuk proses seterusnya selepas pengguna klik butang submit-->
<form action="proses_login.php?kat=1" method="POST">

<div id="tajuk" class="resizable-text">Log Masuk Admin</div><p>

<table cellpadding = '15px'>
<tr>
	<td style="width: 20px"></td>
	<td></td>
	<td></td>
	<td style="width: 20px"></td>
</tr>
<tr>
	<td></td>
	<td class="resizable-text">Login ID :</td>
	<td><input type="text" name="logid" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td class="resizable-text">Kata Laluan :</td>
	<td><input type="password" name="klaluan" pattern=".{5,12}" title="5-12 aksara" required></td>
		<!-- pattern : untuk setkan had bawah(min) dan had atas(max) -->
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td style="text-align: right;"><input type="submit" name="btnLog" value="Log Masuk" class="resizable-text"></td>
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