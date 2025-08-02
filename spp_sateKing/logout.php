<?php
//Start session
session_start();

//Destroy session
session_destroy();

//Redirect ke halaman utama
header("Location: index.php");
exit();
?>