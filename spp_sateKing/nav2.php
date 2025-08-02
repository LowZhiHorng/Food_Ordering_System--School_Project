<?php
//session
include('session.php');
?>
<html>
<style>
body {
	margin: 5;
}
#navbar {
	position: sticky;
	top: 0;
	min-height: 60px;
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
#navbar a:hover, #dropdown:hover #dropbtn {
	background-color: #696969;
	color: wheat; /* font color semasa mouseover */
	font-weight: bold;
}
#dropdown {
	float: right;
	overflow: hidden;
}
#dropdown #dropbtn {
	font-size: 22px;
	border: none;
	outline: none;
	color: black;
	padding: 13px 20px;
	background-color: inherit;
	font-family: inherit;
	font-weight: bold;
	margin: 0;
}
#dropdown-content {
	display: none;
	position: absolute;
	background-color: #F2F2F2;
	min-width: 160px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
	right: 0;
}
#dropdown-content a{
	float: none;
	color: black;
	padding: 13px 20px;
	text-decoration: none;
	display: block;
	text-align: right;
}
#dropdown-content a:hover {
	background-color: #393E46;
}
#dropdown:hover #dropdown-content {
	display: block;
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
#nav2-links {
    display: flex;
}
</style>
<body>

<?php
if ($kat == 1) //Menu Admin
{
	$utama='<a href="senarai_makanan.php">';
	$menu1='<a href="senarai_makanan.php">Senarai Makanan</a>';
	$menu2='<a href="borang_makanan.php">Tambah Makanan</a>';
	$menu3='<a href="senarai_pesanan.php">Senarai Pesanan</a>';
	$menu4='<a href="senarai_staf.php">Senarai Staf</a>';
	$menu5='';
}
else //Menu Pelanggan
{
	$utama='<a href="menu.php">';
	$menu1='';
	$menu2='';
	$menu3='';
	$menu4='';
	$menu5='<a href="bakul_saya.php">Bakul Saya</a>';
}
?>

<div id="navbar">
	<div id="font-size-controls">
		<button id="size-increase">+</button>
		<button id="size-decrease">-</button>
	</div>
	<div id="nav2-links">
		<?php echo $utama; ?>Utama</a>
		<?php echo $menu5; ?>
		<div id="dropdown">
			<button id="dropbtn">Hello, <?php echo $nama; ?> </button>
			<div id="dropdown-content">
				<!-- Papar menu ikut kategori pengguna -->
				<?php echo $menu1;
					echo $menu2;
					echo $menu3;
					echo $menu4; ?>
				<a href="logout.php">Log Keluar</a>
			</div>
		</div>
	</div>
</div>

</body>
</html>