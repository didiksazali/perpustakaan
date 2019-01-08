<?php
$host     = "localhost";
$user     = "root";
$password = "";
$database = "perpustakaan";

$today = date("Y-m-d");
$now = strtotime($today);
$aweek = date("Y-m-j", strtotime("+7 day", $now));

$koneksi   = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno($koneksi)) {

   echo "Failed to connect to MySQL: " . mysqli_connect_error();

}
?>
