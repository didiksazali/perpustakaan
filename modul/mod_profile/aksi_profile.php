<?php
session_start();
error_reporting(1);
include '../../config/koneksi.php';

$page=$_GET['page'];
$act=$_GET['act'];

// edit profile
if ($page=='profile' AND $act=='update'){
	$id =$_POST["id"];
	$nama_lengkap = $_POST["nama_lengkap"];
	$username = $_POST["username"];
	//$password = md5($_POST["password"]);
	$email = $_POST["email"];

	//$foto = $_POST["foto"];

	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];
	$direktori = "../../images/users/";

	move_uploaded_file($tmp,$direktori.$foto);

	$blokir = $_POST["blokir"];

	if($_POST["password"]!=""){
		$password = md5($_POST["password"]);
		if (!empty($foto)) {
			$sql = "UPDATE user SET username='$username', password='$password', nama_lengkap='$nama_lengkap', email='$email', foto='$foto', blokir='$blokir' WHERE id='$id'";
			mysqli_query($koneksi, $sql);
			$_SESSION['foto']=$direktori.$foto;
			$_SESSION['username']=$username;
			mysqli_close($koneksi);
			header('location:../../index.php?page=profile');
		}
		elseif (empty($foto)) {
		$sql3 = "UPDATE user SET username='$username', password='$password', nama_lengkap='$nama_lengkap', email='$email', blokir='$blokir' WHERE id='$id'";
		mysqli_query($koneksi, $sql3);
		mysqli_close($koneksi);
		$_SESSION['username']=$username;
		header('location:../../index.php?page=profile');
		}
	}
	elseif($_POST["password"]==""){
		if (!empty($foto)) {
		$sql2 = "UPDATE user SET username='$username', nama_lengkap='$nama_lengkap', email='$email', foto='$foto', blokir='$blokir' WHERE id='$id'";
		mysqli_query($koneksi, $sql2);
		$_SESSION['foto']=$direktori.$foto;
		$_SESSION['username']=$username;
		mysqli_close($koneksi);
		header('location:../../index.php?page=profile');
		}
	elseif (empty($foto)) {
		$sql4 = "UPDATE user SET username='$username', nama_lengkap='$nama_lengkap', email='$email', blokir='$blokir' WHERE id='$id'";
		mysqli_query($koneksi, $sql4);
		$_SESSION['username']=$username;
		mysqli_close($koneksi);
		header('location:../../index.php?page=profile');
		}
	}
	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

}
?>
