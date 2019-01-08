<script language="javascript">
	function validasi(form){
		if (form.npm.value == ""){
			alert("Anda belum mengisikan NPM.");
			form.npm.focus();
			return (false);
		}
		if (form.nama_peminjaman.value == ""){
			alert("Anda belum mengisikan nama peminjaman.");
			form.nama_peminjaman.focus();
			return (false);
		}
		if (form.jenis_kelamin.value == ""){
			alert("Anda belum mengisikan jenis kelamin.");
			form.jenis_kelamin.focus();
			return (false);
		}
		if (form.jurusan.value == ""){
			alert("Anda belum mengisikan jurusan.");
			form.jurusan.focus();
			return (false);
		}
		if (form.foto_peminjaman.value == ""){
			alert("Anda belum mengisikan foto peminjaman.");
			form.foto_peminjaman.focus();
			return (false);
		}
	}
</script>

<?php

$aksi = "modul/mod_peminjaman/aksi_peminjaman.php";
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Peminjaman
        <!--<small>Optional description</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?page=peminjaman&act=input"><i class="fa fa-user"></i> Tambah Peminjaman</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Peminjaman Form</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo $aksi;?>?page=peminjaman&act=input" onSubmit="return validasi(this)">
                  <div class="box-body">

										<div class="form-group">
	                      <label for="inputEmail3" class="col-sm-2 control-label">Kode Buku</label>
	                      <div class="col-sm-10">
	                        <!-- <input type="text" class="form-control" name="kode_buku" id="kode_buku" placeholder=""> -->
	                        <select name='npm' class="form-control">
	      									<?php
	      									$sqlquery = "SELECT * FROM mahasiswa";
	      									if ($result = mysqli_query($koneksi, $sqlquery)) {
	      										while ($row = mysqli_fetch_assoc($result)) {
	      											$npm = $row["npm"];
	      											$nama_mahasiswa = $row["nama_mahasiswa"];
	      											echo "<option value='$npm'>$npm :: $nama_mahasiswa</option>";
	      										}
	      										mysqli_free_result($result);
	      									}
	      									?>
	      									</select>
	                      </div>
	                    </div>

                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kode Buku</label>
                      <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="kode_buku" id="kode_buku" placeholder=""> -->
                        <select name='kode_buku' class="form-control">
      									<?php
      									$sqlquery = "SELECT * FROM buku";
      									if ($result = mysqli_query($koneksi, $sqlquery)) {
      										while ($row = mysqli_fetch_assoc($result)) {
      											$kode_buku = $row["kode_buku"];
      											$judul = $row["judul"];
      											echo "<option value='$kode_buku'>$kode_buku :: $judul</option>";
      										}
      										mysqli_free_result($result);
      									}
      									?>
      									</select>
                      </div>
                    </div>

											<div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label">Tanggal Pinjam</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" name="tgl_pinjam" id="tgl_pinjam" placeholder="" value="<?php echo tgl_indo($today); ?>">
                            <input type="hidden" class="form-control" name="tanggal_pinjam" id="tanggal_pinjam" placeholder="" value="<?php echo $today; ?>">
                          </div>
												</div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Kembali</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="tgl_kembali" id="tgl_kembali" placeholder="" value="<?php echo tgl_indo($aweek); ?>">
                              <input type="hidden" class="form-control" name="tanggal_kembali" id="tanggal_kembali" placeholder="" value="<?php echo $aweek; ?>">
                            </div>
                          </div>
                  </div>
    			  <!-- /.box-body -->
                  <div class="box-footer">
										<button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-floppy-save"></span></button>
				            <button class="btn btn-danger pull-right" type="button" onclick="self.history.back()"><span class="glyphicon glyphicon-remove"></span></button>
                  </div>
    			  </form>
    </section>
    <!-- /.content -->
