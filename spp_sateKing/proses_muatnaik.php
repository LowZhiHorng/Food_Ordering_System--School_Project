<?php
include ("session.php");

//format files csv yang diterima browser
$jenis = array(
		'text/x-comma-separated-values',
		'text/comma-separated-values',
		'application/x-csv',
		'text/x-csv',
		'text/csv',
		'application/csv',
		'application/vnd.ms-excel',
		'application/octet-stream');

//dapatkan file csv yang dimuat naik
$file = $_FILES["file_csv"]["tmp_name"];

//pastikan hanya file csv sahaja yang diterima
if (in_array($_FILES['file_csv']['type'], $jenis))
{
	//buka dan baca file tersebut, r = read-only
	$file_open = fopen($file,"r");
	
	//baca data Line by Line
	while(($data = fgetcsv($file_open)) !== FALSE)
	{
		$login = $data[0];
		$pwd = $data[1];
		$nama = $data[2];
		
		//semak jika LoginID sudah wujud dalam jadual
		$sql = "SELECT * FROM admin WHERE login_id='$login'";
		$res = mysqli_query($conn, $sql) or die(mysqli_error());
		
		//jika nokp wujud, paparkan mesej
		if (mysqli_num_rows($res) > 0)
		{
			echo '<script>alert("Login ID sudah wujud!");window.location.href="senarai_staf.php";</script>';
		} else {
			$mysql= "INSERT INTO admin (login_id, kata_laluan, nama) VALUES('$login', '$pwd', '$nama')";
			
			if (mysqli_query($conn, $mysql))
			{
				echo '<script>alert("Berjaya muat naik data maklumat staf!");window.location.href="senarai_staf.php";</script>';
			} else {
				echo "Error ; " . mysqli_error($conn);
			}
		}
	}

//paparkan popup mesej jika bukan fail csv
}
else
{
	echo '<script>alert("Pilih fail .csv sahaja!");window.location.href="senarai_staf.php";</script>';
}

//Close connection
mysqli_close($conn);
?>