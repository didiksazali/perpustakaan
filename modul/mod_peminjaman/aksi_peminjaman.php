<?php
session_start();
error_reporting(1);
include '../../config/koneksi.php';
include '../../fungsi/fungsi_waktu.php';
include '../../fungsi/fungsi_indotgl.php';

$page=$_GET['page'];
$act=$_GET['act'];

if ($page=='peminjaman' AND $act=='input'){
  $npm = $_POST["npm"];
	$kode_buku = $_POST["kode_buku"];
  $tanggal_pinjam = $_POST["tanggal_pinjam"];
  $tanggal_kembali = $_POST["tanggal_kembali"];

	$sql = "INSERT INTO peminjaman VALUES ('','$npm','$kode_buku','$tanggal_pinjam', '$tanggal_kembali')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:../../index.php?page=laporan');
	}
	else {echo "gagal";}

}

	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

?>
