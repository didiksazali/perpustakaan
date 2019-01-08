<?php
session_start();
error_reporting(1);
include '../../config/koneksi.php';

$page=$_GET['page'];
$act=$_GET['act'];

// hapus user
if ($page=='user' AND $act=='delete'){
	$id = $_GET['id'];
	$row = mysqli_query($koneksi, "DELETE FROM user WHERE id = '$id'");
	header('location:../../index.php?page=user');
}

// tambah user
elseif ($page=='user' AND $act=='input'){
	$nama_lengkap = $_POST["nama_lengkap"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$level = $_POST["level"];

	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];
	$direktori = "../../images/users/";

	move_uploaded_file($tmp,$direktori.$foto);

	$blokir = $_POST["blokir"];

	$password = md5($_POST["password"]);
	$sql = "INSERT INTO user VALUES ('', '$nama_lengkap', '$username','$password','$email','$level','$foto','$blokir')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:../../index.php?page=user');
	}
	else {echo "gagal";}
}

// edit calon
elseif ($page=='user' AND $act=='update'){
	$id =$_POST["id"];
	$nama_lengkap = $_POST["nama_lengkap"];
	$username = $_POST["username"];
	$email = $_POST["email"];

	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];
	$direktori = "../../images/users/";

	move_uploaded_file($tmp,$direktori.$foto);

	$blokir = $_POST["blokir"];

	if($_POST["password"]!=""){
		$password = md5($_POST["password"]);
		if (!empty($foto)) {
			$sql = "UPDATE user SET nama_lengkap='$nama_lengkap', username='$username', password='$password', email='$email', foto='$foto', blokir='$blokir' WHERE id='$id'";
			mysqli_query($koneksi, $sql);
			mysqli_close($koneksi);
			header('location:../../index.php?page=user');
		}
		elseif (empty($foto)) {
		$sql3 = "UPDATE user SET nama_lengkap='$nama_lengkap', username='$username', password='$password', email='$email', blokir='$blokir' WHERE id='$id'";
		mysqli_query($koneksi, $sql3);
		mysqli_close($koneksi);
		header('location:../../index.php?page=user');
		}
	}
	elseif($_POST["password"]==""){
		if (!empty($foto)) {
		$sql2 = "UPDATE user SET username='$username', nama_lengkap='$nama_lengkap', email='$email', foto='$foto', blokir='$blokir' WHERE id='$id'";
		mysqli_query($koneksi, $sql2);
		mysqli_close($koneksi);
		header('location:../../index.php?page=user');
		}
	elseif (empty($foto)) {
		$sql4 = "UPDATE user SET username='$username', nama_lengkap='$nama_lengkap', email='$email', blokir='$blokir' WHERE id='$id'";
		mysqli_query($koneksi, $sql4);
		mysqli_close($koneksi);
		header('location:../../index.php?page=user');
		}
	}
	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

}
?>
