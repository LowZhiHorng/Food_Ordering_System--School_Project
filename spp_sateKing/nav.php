<html>
<style>
body {
	margin: 5;
}
#navbar {
	position: sticky;
	top: 0;
	overflow: hidden;
	background-color: #808080;
	font-family: cursive;
	font-weight: bold;
	display: flex;
    align-items: center;
    padding: 5px 10px;
    justify-content: space-between;
}
#navbar a {
	float: right;
	display: block;
	color: black; /* font color */
	text-align: center;
	padding: 13px 20px;
	text-decoration: none;
	font-size: 22px;
}
#navbar a:hover{
	background-color: #696969;
	color: wheat; /* font color semasa mouseover */
	font-weight: bold;
}
#font-size-controls {
    display: block;
    align-items: center;
}

#font-size-controls button {
    padding: 3px 12px;
    margin: 0 5px;
    border: 1px solid #ccc;
    cursor: pointer;
    font-size: 35px;
    background-color: wheat;
}
#nav-links {
    display: flex;
}
</style>
<body>

<div id ="navbar">
	<div id="font-size-controls">
		<button id="size-increase">+</button>
		<button id="size-decrease">-</button>
	</div>
	<div id="nav-links">
		<a href="index.php">Utama</a>
		<a href="borang_login.php">Log Masuk</a>
		<a href="borang_loginAdmin.php">
			<img src="gambar/admin.png" width="29" height="29" title="Log Masuk Admin">
			</a>
	</div>
</div>

</body>
</html>