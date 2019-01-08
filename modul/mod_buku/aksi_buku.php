<?php
session_start();
error_reporting(1);
include '../../config/koneksi.php';
include '../../fungsi/fungsi_waktu.php';
include '../../fungsi/fungsi_indotgl.php';

$page=$_GET['page'];
$act=$_GET['act'];

// hapus buku
if ($page=='buku' AND $act=='delete'){
	$id=$_GET['id'];
  $row = mysqli_query($koneksi, "DELETE FROM buku WHERE id = '$id'");
	header('location:../../index.php?page=buku');
}

// tambah buku
elseif ($page=='buku' AND $act=='input'){
	$kode_buku = $_POST["kode_buku"];
	$judul = $_POST["judul"];
	$pengarang = $_POST["pengarang"];
  $tahun = $_POST["tahun"];
  $penerbit = $_POST["penerbit"];

	$sql = "INSERT INTO buku VALUES ('','$kode_buku','$judul','$pengarang','$tahun', '$penerbit')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:../../index.php?page=buku');
	}
	else {echo "gagal";}

}

// edit buku
elseif ($page=='buku' AND $act=='update'){
  $id = $_POST["id"];
  $judul = $_POST["judul"];
	$pengarang = $_POST["pengarang"];
  $tahun = $_POST["tahun"];
  $penerbit = $_POST["penerbit"];

		$sql = "UPDATE buku SET judul='$judul', pengarang='$pengarang', tahun='$tahun', penerbit='$penerbit' WHERE id='$id'";
		mysqli_query($koneksi, $sql);
		mysqli_close($koneksi);
		header('location:../../index.php?page=buku');
}
	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

?>
