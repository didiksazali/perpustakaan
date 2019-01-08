<script language="javascript">
	function validasi(form){
		if (form.npm.value == ""){
			alert("Anda belum mengisikan NPM.");
			form.npm.focus();
			return (false);
		}
		if (form.nama_mahasiswa.value == ""){
			alert("Anda belum mengisikan nama mahasiswa.");
			form.nama_mahasiswa.focus();
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
		if (form.foto_mahasiswa.value == ""){
			alert("Anda belum mengisikan foto mahasiswa.");
			form.foto_mahasiswa.focus();
			return (false);
		}
	}
</script>

<?php

$aksi = "modul/mod_mahasiswa/aksi_mahasiswa.php";
switch($_GET['act']){
	default:
	?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Mahasiswa
        <!--<small>Optional description</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="?page=mahasiswa"><i class="fa fa-user"></i> Data Mahasiswa</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
	  <!-- /.box -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Mahasiswa Page</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
							<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div class="row">
									<div class="col-sm-10"><?php
												?>
						</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-info pull-right" onclick="window.location.href='?page=mahasiswa&act=input'"><span class="fa fa-user-plus"></span></button>
							</div>
								</div>

							<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
									<th>No.</th>
                  <th>NPM</th>
                  <th>Nama Mahasiswa</th>
				  				<th>Jenis Kelamin</th>
                  <th>Jurusan</th>
                  <th>Foto Mahasiswa</th>
								  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$no = 1;
				$p      = new PagingHalaman();
				$batas  = 10;
				$posisi = $p->cariPosisi($batas);

				//$tampil = mysql_query("SELECT * FROM pemilih order by nim asc limit $posisi,$batas ");
				//$no = $posisi+1;
				//while ($data = mysql_fetch_array($tampil)){

    $sqlquery = "SELECT * FROM mahasiswa order by npm asc limit $posisi,$batas";

if ($result = mysqli_query($koneksi, $sqlquery)) {
    while ($row = mysqli_fetch_assoc($result)) {
	   ?>
		<tr>
									<td><?php echo $no;?></td>
                  <td><?php echo $row["npm"];?></td>
                  <td><?php echo $row["nama_mahasiswa"];?></td>
				          <td><?php echo $row["jenis_kelamin"];?></td>
                  <td><?php echo $row["jurusan"];?></td>
                  <td> <img src="images/mahasiswa/<?php echo $row['foto_mahasiswa']; ?>" width="120px" name="foto_mahasiswa" id="foto_mahasiswa"/> </td>
				   <td><a href='?page=mahasiswa&act=update&id=<?php echo $row['id'];?>'><button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-wrench"></span></button></a>
            <a onclick="return confirm('Anda yakin ingin menghapus data tersebut?')" href='<?php echo $aksi;?>?page=mahasiswa&act=delete&id=<?php echo $row['id'];?>'><button type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                </tr>
    <?php
		$no++;
	}
						$jmldata = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM mahasiswa"));
						$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
						$linkHalaman = $p->navHalaman($_GET[num], $jmlhalaman);
    /* free result set */
    mysqli_free_result($result);
}
/* close connection */
mysqli_close($koneksi);
?>
                </tbody>
              </table>

<div class="col-sm-12" align="right">
	<?php echo "<ul class='pagination'>$linkHalaman </ul>"; ?>
</div>
	</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->

    <?php
    break;
    // form tambah mahasiswa
    case "input":
    ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Mahasiswa
        <!--<small>Optional description</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?page=mahasiswa&act=input"><i class="fa fa-user"></i> Tambah Mahasiswa</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Mahasiswa Form</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo $aksi;?>?page=mahasiswa&act=input" onSubmit="return validasi(this)">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">NPM</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="npm" id="npm" >
                      </div>
                    </div>

                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Mahasiswa</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" placeholder="">
                      </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                        <div class="radio">
                          <label>
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" checked="" >
                            Laki-laki
                          </label>
                <label>
                  <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" >
                            Perempuan
                          </label>
                        </div>

                    </div>
                      </div>

											<div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label">Jurusan</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="">
													</div>
												</div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Foto Mahasiswa</label>
                            <div class="col-sm-10">
                              <input type="file" name="foto_mahasiswa" id="foto_mahasiswa">
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

    <?php
  	break;
  	// form detail mahasiswa
  	case "update":
    $id = $_GET['id'];
    $sqlquery = "SELECT * FROM mahasiswa where id='$id'";
    $result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
    $row = mysqli_fetch_assoc($result);
    ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Mahasiswa
        <!--<small>Optional description</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?page=mahasiswa&act=update&id=<?php echo $id;?>"><i class="fa fa-users"></i> Update Mahasiswa</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Mahasiswa Form</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo $aksi;?>?page=mahasiswa&act=update">
                  <div class="box-body">

                    <input type="hidden" name="id" id="id" value="<?php echo $row["id"]; ?>">

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">NPM</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="npm" value="<?php echo $row["npm"]; ?>" id="npm" readonly="true">
                      </div>
                    </div>

                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Mahasiswa</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_mahasiswa" value="<?php echo $row["nama_mahasiswa"]; ?>" id="nama_mahasiswa" placeholder="">
                      </div>
                    </div>

                      <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>
                          <div class="col-sm-10">
                          <div class="radio">
                            <label>
                              <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" <?php if ($row["jenis_kelamin"]=="Laki-laki") { echo "checked";} ?> >
                              Laki-laki
                            </label>
                  <label>
                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" <?php if ($row["jenis_kelamin"]=="Perempuan") { echo "checked";} ?> >
                              Perempuan
                            </label>
                          </div>
                      </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jurusan</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="jurusan" value="<?php echo $row["jurusan"]; ?>" id="jurusan" placeholder="">
                            </div>
                          </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Foto</label>
                            <div class="col-sm-10">
                              <img src="images/mahasiswa/<?php echo $row['foto_mahasiswa']; ?>" width="120px" name="foto_mahasiswa" id="foto_mahasiswa"/>
                              <input type="file" name="foto_mahasiswa" value="<?php echo $row["foto_mahasiswa"]; ?>" id="foto_mahasiswa">
                            </div>
                          </div>

                  </div>
            <!-- /.box-body -->
                  <div class="box-footer">
										<button type="submit" class="btn btn-success pull-right" name="simpan" onClick="return validasi()"><span class="glyphicon glyphicon-floppy-save"></span></button>
				            <button class="btn btn-danger pull-right" type="button" onclick="self.history.back()"><span class="glyphicon glyphicon-remove"></span></button>
                  </div>
            </form>
    </section>
    <!-- /.content -->
    <?php
      break;
    }
    ?>
