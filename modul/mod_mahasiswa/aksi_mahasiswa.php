<?php
session_start();
error_reporting(1);
include '../../config/koneksi.php';

$page=$_GET['page'];
$act=$_GET['act'];

// hapus mahasiswa
if ($page=='mahasiswa' AND $act=='delete'){
	$id = $_GET['id'];
	$row = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = '$id'");
	header('location:../../index.php?page=mahasiswa');
}

// tambah mahasiswa
elseif ($page=='mahasiswa' AND $act=='input'){
  $npm = $_POST["npm"];
	$nama_mahasiswa = $_POST["nama_mahasiswa"];
	$jenis_kelamin = $_POST["jenis_kelamin"];
	$jurusan = $_POST["jurusan"];

	$foto_mahasiswa = $_FILES['foto_mahasiswa']['name'];
	$tmp = $_FILES['foto_mahasiswa']['tmp_name'];
	$direktori = "../../images/mahasiswa/";

	move_uploaded_file($tmp,$direktori.$foto_mahasiswa);

	$sql = "INSERT INTO mahasiswa VALUES ('','$npm','$nama_mahasiswa','$jenis_kelamin','$jurusan','$foto_mahasiswa')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:../../index.php?page=mahasiswa');
	}
	else {echo "gagal";}
}

// edit mahasiswa
elseif ($page=='mahasiswa' AND $act=='update'){
  $id = $_POST["id"];
  $npm = $_POST["npm"];
	$nama_mahasiswa = $_POST["nama_mahasiswa"];
	$jenis_kelamin = $_POST["jenis_kelamin"];
	$jurusan = $_POST["jurusan"];

	$foto_mahasiswa = $_FILES['foto_mahasiswa']['name'];
	$tmp = $_FILES['foto_mahasiswa']['tmp_name'];
	$direktori = "../../images/mahasiswa/";

	move_uploaded_file($tmp,$direktori.$foto_mahasiswa);

		if (!empty($foto_mahasiswa)) {
			$sql = "UPDATE mahasiswa SET npm='$npm', nama_mahasiswa='$nama_mahasiswa', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan', foto_mahasiswa='$foto_mahasiswa' WHERE id='$id'";
			mysqli_query($koneksi, $sql);
			mysqli_close($koneksi);
			header('location:../../index.php?page=mahasiswa');
		}
		elseif (empty($foto_mahasiswa)) {
		$sql2 = "UPDATE mahasiswa SET npm='$npm', nama_mahasiswa='$nama_mahasiswa', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan' WHERE id='$id'";
		mysqli_query($koneksi, $sql2);
		mysqli_close($koneksi);
		header('location:../../index.php?page=mahasiswa');
		}

	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

}
?>
