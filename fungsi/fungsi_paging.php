<?php
class PagingBerita{
	// Fungsi untuk mencek halaman dan posisi data
	function cariPosisi($batas){
		if(empty($_GET[num])){
			$posisi=0;
			$_GET[num]=1;
		}
		else{
			$posisi = ($_GET[num]-1) * $batas;
		}
		return $posisi;
	}

	// Fungsi untuk menghitung total halaman
	function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}

	// Fungsi untuk link halaman 1,2,3 (untuk admin)
	function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = "";

		// Link halaman 1,2,3, ...
		for ($i=1; $i<=$jmlhalaman; $i++){
			if ($i == $halaman_aktif){
				$link_halaman .= "<li class='paginate_button active'><a href='$_SERVER[PHP_SELF]?page=berita'>$i</a></li> ";
			}
			else{
				$link_halaman .= "<li class='paginate_button'><a href='$_SERVER[PHP_SELF]?page=berita&num=$i'>$i</a></li>";
			}
			$link_halaman .= " ";
		}

		return $link_halaman;
	}
}

class PagingHalaman{
	// Fungsi untuk mencek halaman dan posisi data
	function cariPosisi($batas){
		if(empty($_GET[num])){
			$posisi=0;
			$_GET[num]=1;
		}
		else{
			$posisi = ($_GET[num]-1) * $batas;
		}
		return $posisi;
	}

	// Fungsi untuk menghitung total halaman
	function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}

	// Fungsi untuk link halaman 1,2,3 (untuk admin)
	function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = "";

		// Link halaman 1,2,3, ...
		for ($i=1; $i<=$jmlhalaman; $i++){
			if ($i == $halaman_aktif){
				$link_halaman .= "<li class='paginate_button active'><a href='$_SERVER[PHP_SELF]?page=pengurus'>$i</a></li> ";
			}
			else{
				$link_halaman .= "<li class='paginate_button'><a href='$_SERVER[PHP_SELF]?page=pengurus&num=$i'>$i</a></li>";
			}
			$link_halaman .= " ";
		}

		return $link_halaman;
	}
}
?>
